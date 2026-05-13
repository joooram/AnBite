<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AdminController;

// Root → Login
Route::get('/', function () {
    return redirect()->route('login');
});

// ── AUTH ──────────────────────────────────────────────────────
Route::get('/login',  [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/forgot-password', function () { return view('auth.login'); })->name('password.request');

// ── DASHBOARD ─────────────────────────────────────────────────
Route::get('/dashboard', function () {
    if (!auth()->check()) return redirect()->route('login');
    return view('auth.dashboard');
})->name('dashboard');

// ── PATIENT ROUTES ────────────────────────────────────────────
Route::get('/patients/create',         [PatientController::class, 'create'])->name('patients.create');
Route::get('/patients',                [PatientController::class, 'index'])->name('patients.index');
Route::post('/patients',               [PatientController::class, 'store'])->name('patients.store');
Route::post('/patients/send-reminder', [PatientController::class, 'sendReminder'])->name('patients.sendReminder');
Route::delete('/patients/{id}',        [PatientController::class, 'destroy'])->name('patients.destroy');
Route::get('/patients/{id}',           [PatientController::class, 'show'])->name('patients.show');

// ── ADMIN ROUTES ──────────────────────────────────────────────
Route::get('/admin/adminDashboard', [AdminController::class, 'index'])->name('admin.adminDashboard');
Route::get('/admin/accounts',       [AdminController::class, 'accounts'])->name('admin.accounts');
Route::post('/admin/staff',              [AdminController::class, 'storeStaff'])->name('admin.storeStaff');
Route::put('/admin/staff/{id}',          [AdminController::class, 'updateStaff'])->name('admin.updateStaff');
Route::post('/admin/staff/{id}/password',[AdminController::class, 'updatePassword'])->name('admin.updatePassword');
Route::delete('/admin/staff/{id}',       [AdminController::class, 'destroyStaff'])->name('admin.destroyStaff');

// ── HOTSPOT MAP & CHARTS ──────────────────────────────────────
Route::get('/hotspot', function () { return view('hotspot.index'); })->name('hotspot');
Route::get('/charts', function () { return view('charts.index'); })->name('charts')->middleware('auth');