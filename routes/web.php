<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\FlowerController;


Route::get('/', [HomePageController::class, 'index'])->name('homepage');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showEmail'])->name('register.email.form');
Route::post('/register', [AuthController::class, 'handleEmail'])->name('register.email.handle');
Route::get('/register/setup', [AuthController::class, 'showSignupForm'])->name('register.setup.form');
Route::post('/register/setup', [AuthController::class, 'handleSignup'])->name('register.setup');

Route::get('/about', [StaticPageController::class, 'about'])->name('about');


Route::middleware('auth')->group(function () {
    Route::get('/letter/create', [LetterController::class, 'create'])->name('letter.create');
    Route::post('/letter/store', [LetterController::class, 'store'])->name('letter.store');

    Route::get('/letter/{letter}/edit', [LetterController::class, 'edit'])->name('letter.edit');
    Route::put('/letter/{letter}', [LetterController::class, 'update'])->name('letter.update');
});

Route::delete('/letter/{letter}', [LetterController::class, 'destroy'])->name('letter.destroy');
Route::get('/letters', [LetterController::class, 'show'])->name('letter.show');
