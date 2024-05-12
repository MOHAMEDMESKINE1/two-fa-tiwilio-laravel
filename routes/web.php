<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
  
Route::get('2fa', [App\Http\Controllers\TwoFAController::class, 'index'])->name('two_fa.index');
Route::post('2fa', [App\Http\Controllers\TwoFAController::class, 'store'])->name('two_fa.post');
Route::get('2fa/reset', [App\Http\Controllers\TwoFAController::class, 'resend'])->name('two_fa.resend');
