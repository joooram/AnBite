<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AdminController;

// Root → Login
Route::get('/', function () {
    return redirect()->route('login');
});

// ── AUTH ──────────────────────────────────────────────────────
Route::get('/login',  [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register',  [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/otp-verify',  [OtpController::class, 'show'])->name('otp.show');
Route::post('/otp-verify', [OtpController::class, 'verify'])->name('otp.verify');
Route::post('/otp-resend', [OtpController::class, 'resend'])->name('otp.resend');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/forgot-password', function () { return view('auth.login'); })->name('password.request');

// ── DASHBOARD ─────────────────────────────────────────────────
Route::get('/dashboard', function () {
    if (!session('user_id')) return redirect()->route('login');
    return view('auth.dashboard');
})->name('dashboard');

// ── PATIENT ROUTES ────────────────────────────────────────────
Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create');
Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
Route::post('/patients', [PatientController::class, 'store'])->name('patients.store');
Route::get('/patients/{id}', [PatientController::class, 'show'])->name('patients.show');

// ── ADMIN ROUTES ──────────────────────────────────────────────
// DINAGDAG/NILINAW: Route para sa Admin Dashboard (Blangkong page na may sidebar)
Route::get('/admin/adminDashboard', [AdminController::class, 'index'])->name('admin.adminDashboard');

// Route para i-process ang pagpapalit ng password
Route::post('/admin/update-password/{id}', [AdminController::class, 'updatePassword'])->name('admin.updatePassword');

Route::get('/admin/accounts', function () {
    // Siguraduhin na tumutugma ito kung nasaan nakasave ang iyong file.
    // Kung nasa loob ito ng 'views' folder lang, gawin mong view('admin-AccountManagement')
    // Kung nasa loob ng 'auth', gawin mong view('auth.admin-AccountManagement')
    return view('auth.admin-AccountManagement'); 
})->name('admin.accounts');


// ── HOTSPOT MAP ───────────────────────────────────────────────
Route::get('/hotspot', function () {
    return view('hotspot.index');
})->name('hotspot');

// ── CHARTS & REPORTS ─────────────────────────────────────────
Route::get('/charts', function () {
    if (!session('user_id')) return redirect()->route('login');
    return view('charts.index');
})->name('charts');