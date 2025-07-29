<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\Auth\EmailVerificationController;
use App\Http\Controllers\Admin\Auth\LogoutController;
use App\Livewire\Admin\Auth\Login;
use App\Livewire\Admin\Auth\Passwords\Confirm;
use App\Livewire\Admin\Auth\Passwords\Email;
use App\Livewire\Admin\Auth\Passwords\Reset;
use App\Livewire\Admin\Auth\Register;
use App\Livewire\Admin\Auth\Verify;


// Login e registro do admin (públicos)
Route::middleware('guest:admin')->group(function () {
    Route::get('admin/login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');
});

// Rotas de recuperação/verificação de senha para admin
Route::get('password/reset', Email::class)->name('password.request');
Route::get('password/reset/{token}', Reset::class)->name('password.reset');

// Autenticado como admin
Route::middleware('auth:admin')->group(function () {
    Route::get('email/verify', Verify::class)->middleware('throttle:6,1')->name('verification.notice');
    Route::get('password/confirm', Confirm::class)->name('password.confirm');
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)->middleware('signed')->name('verification.verify');
    Route::post('logout', LogoutController::class)->name('logout');
});
