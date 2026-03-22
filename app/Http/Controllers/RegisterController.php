<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Carbon\Carbon;

class RegisterController extends Controller
{
    // Show register page
    public function show()
    {
        return view('auth.Register');
    }

    // Handle register form submission
    public function register(Request $request)
    {
        // Validate all fields
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'username'   => 'required|string|max:100|unique:users,username',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|string|min:6|confirmed',
        ], [
            'username.unique' => 'This username is already taken. Please choose another.',
            'email.unique'    => 'This email is already registered.',
            'password.min'    => 'Password must be at least 6 characters.',
            'password.confirmed' => 'Passwords do not match.',
        ]);

        // Generate 6-digit OTP
        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        // Save user to database (unverified)
        $user = User::create([
            'first_name'     => $request->first_name,
            'last_name'      => $request->last_name,
            'username'       => $request->username,
            'email'          => $request->email,
            'password'       => Hash::make($request->password),
            'otp'            => $otp,
            'otp_expires_at' => Carbon::now()->addMinutes(10),
            'is_verified'    => false,
        ]);

        // Send OTP email
        Mail::send('emails.otp', [
            'otp'        => $otp,
            'first_name' => $user->first_name,
        ], function ($message) use ($user) {
            $message->to($user->email)
                    ->subject('AnBite — Your Verification Code');
        });

        // Store user ID in session for OTP verification
        session(['otp_user_id' => $user->id]);

        // Redirect to OTP verification page
        return redirect()->route('otp.show')
               ->with('info', 'A 6-digit verification code has been sent to ' . $user->email);
    }
}