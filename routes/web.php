<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('website.landing.index');
})->name('website.index');


// Public (guest) routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); // Show login form
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit'); // Handle login submission

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register'); // Show registration form
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit'); // Handle registration submission

    Route::get('/password/reset', [AuthController::class, 'showResetPasswordForm'])->name('password.request'); // Show password reset form
    // Route::post('/password/reset', [AuthController::class, 'resetPassword'])->name('password.reset'); // Handle password reset submission
});

// Authenticated (user) routes
Route::middleware('auth.user')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard'); // User dashboard

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // Logout route
});
