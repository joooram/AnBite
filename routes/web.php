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
// Patient Registration — show the add patient form
Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create');

// Patient Records — show the list of all patients
Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');

// Save new patient to database
Route::post('/patients', [PatientController::class, 'store'])->name('patients.store');

// View one patient's full details
Route::get('/patients/{id}', [PatientController::class, 'show'])->name('patients.show');

// Route para ipakita ang admin page
Route::get('/admin/adminDashboard', [AdminController::class, 'index'])->name('admin.adminDashboard');

// Route para i-process ang pagpapalit ng password
Route::post('/admin/update-password/{id}', [AdminController::class, 'updatePassword'])->name('admin.updatePassword');

// ── HOTSPOT MAP ───────────────────────────────────────────────
Route::get('/hotspot', function () {
    return view('hotspot.index');
})->name('hotspot');

// ── CHARTS & REPORTS ─────────────────────────────────────────
Route::get('/charts', function () {
    if (!session('user_id')) return redirect()->route('login');
    return view('charts.index');
})->name('charts');