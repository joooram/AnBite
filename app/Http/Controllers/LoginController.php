<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // 1. I-validate ang in-input ng user
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // 2. Gamitin ang Auth::attempt para si Laravel na ang mag-login nang secure
        if (Auth::attempt($credentials)) {
            
            // I-regenerate ang session para iwas-hack (Security Best Practice)
            $request->session()->regenerate();

            // 3. I-check kung sino ang nag-login gamit ang Auth::user()
            if (Auth::user()->username === 'admin') {
                return redirect()->route('admin.adminDashboard'); 
            } elseif (Auth::user()->role === 'cho_staff') {
                return redirect()->route('dashboard'); // Pinalitan ang 'auth.dashboard' ng 'dashboard'
            }
        }

        // 4. Kung mali ang username o password
        return back()->withErrors([
            'username' => 'Invalid username or password.',
        ])->onlyInput('username'); // Ibabalik yung nai-type na username para hindi na i-type ulit
    }

    public function logout(Request $request)
    {
        // Tamang paraan ng pag-logout sa Laravel
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}