<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class OtpController extends Controller
{
    // Show OTP verification page
    public function show()
    {
        // If no OTP session, redirect back to register
        if (!session('otp_user_id')) {
            return redirect()->route('register');
        }

        return view('auth.otp-verify');
    }

    // Handle OTP form submission
    public function verify(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
        ], [
            'otp.required' => 'Please enter the verification code.',
            'otp.digits'   => 'The code must be exactly 6 digits.',
        ]);

        // Get user from session
        $userId = session('otp_user_id');
        $user   = User::find($userId);

        // User not found
        if (!$user) {
            return redirect()->route('register')
                   ->withErrors(['otp' => 'Session expired. Please register again.']);
        }

        // Check if OTP has expired
        if (Carbon::now()->isAfter($user->otp_expires_at)) {
            return back()->withErrors([
                'otp' => 'Your verification code has expired. Please register again.',
            ]);
        }

        // Check if OTP matches
        if ($request->otp !== $user->otp) {
            return back()->withErrors([
                'otp' => 'Incorrect verification code. Please try again.',
            ]);
        }

        // OTP is correct — mark user as verified
        $user->update([
            'is_verified'    => true,
            'otp'            => null,
            'otp_expires_at' => null,
        ]);

        // Clear OTP session
        session()->forget('otp_user_id');

        // Redirect to login with success message
        return redirect()->route('login')
               ->with('success', 'Account verified successfully! You can now login.');
    }

    // Resend OTP
    public function resend()
    {
        $userId = session('otp_user_id');
        $user   = User::find($userId);

        if (!$user) {
            return redirect()->route('register');
        }

        // Generate new OTP
        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        $user->update([
            'otp'            => $otp,
            'otp_expires_at' => Carbon::now()->addMinutes(10),
        ]);

        // Resend email
        \Mail::send('emails.otp', [
            'otp'        => $otp,
            'first_name' => $user->first_name,
        ], function ($message) use ($user) {
            $message->to($user->email)
                    ->subject('AnBite — Your New Verification Code');
        });

        return back()->with('info', 'A new verification code has been sent to ' . $user->email);
    }
}