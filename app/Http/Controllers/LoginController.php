<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session(['user_id'   => $user->id,
                     'username'  => $user->username,
                     'full_name' => $user->first_name . ' ' . $user->last_name]);

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'username' => 'Invalid username or password.',
        ]);
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}