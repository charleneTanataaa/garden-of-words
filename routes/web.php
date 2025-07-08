<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\FlowerController;

Route::get('/', [HomePageController::class, 'index']);


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register/email', [AuthController::class, 'showEmailOrOtpForm'])->name('register.email.form');
Route::post('/register/email', [AuthController::class, 'handleEmailOrOtp'])->name('register.email.handle');
Route::get('/register/setup', [AuthController::class, 'showSignupForm'])->name('register.setup.form');
Route::post('/register/setup', [AuthController::class, 'handleSignup'])->name('register.setup');

Route::get('/about', [StaticPageController::class, 'about'])->name('about');

Route::get('/', function () {
    return view('homepage');
});

Route::middleware('auth')->group(function () {
    Route::get('/letter/create', [LetterController::class, 'create'])->name('letter.create');
    Route::post('/letter/store', [LetterController::class, 'store'])->name('letter.store');
});

Route::get('/create', function () {
    return view('letter.create');
});

Route::get('/letters', [LetterController::class, 'show'])->name('letter.show');
