<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\LetterController;

Route::get('/', [HomePageController::class, 'index']);
Route::get('/letter/create', [LetterController::class, 'create'])->name('letter.create');
Route::post('/letter/store', [LetterController::class, 'store'])->name('letter.store');

Route::get('/index', function(){
    return view('index');
Route::get('/', function () {
    return view('homepage');
});
