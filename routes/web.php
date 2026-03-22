<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OtpController;

// Redirect root to login
Route::get('/', function () {
    return redirect()->route('login');
});

// Login routes
Route::get('/login',  [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Register routes
Route::get('/register',  [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// OTP verification routes
Route::get('/otp-verify',   [OtpController::class, 'show'])->name('otp.show');
Route::post('/otp-verify',  [OtpController::class, 'verify'])->name('otp.verify');
Route::post('/otp-resend',  [OtpController::class, 'resend'])->name('otp.resend');

// Logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard (session protected)
Route::get('/dashboard', function () {
    if (!session('user_id')) {
        return redirect()->route('login');
    }
    return view('auth.dashboard');
})->name('dashboard');

// Forgot password placeholder
Route::get('/forgot-password', function () {
    return view('auth.login');
})->name('password.request');