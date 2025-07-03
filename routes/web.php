<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\LetterController;

Route::get('/', [HomePageController::class, 'index']);


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register/email', [AuthController::class, 'showEmailOrOtpForm'])->name('register.email.form');
Route::post('/register/email', [AuthController::class, 'handleEmailOrOtp'])->name('register.email.handle');
Route::get('/register/setup', [AuthController::class, 'showSignupForm'])->name('register.setup.form');
Route::post('/register/setup', [AuthController::class, 'handleSignup'])->name('register.setup');


Route::get('/index', function(){
    return view('index');
});
Route::get('/', function () {
    return view('homepage');
});

Route::middleware('auth')->group(function () {
    Route::get('/letter/create', [LetterController::class, 'create'])->name('letter.create');
    Route::post('/letter/store', [LetterController::class, 'store'])->name('letter.store');
});

