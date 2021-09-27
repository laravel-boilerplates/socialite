<?php

use LaravelBoilerplates\Socialite\Controllers\SocialSessionController;
use LaravelBoilerplates\Socialite\Controllers\RegisteredSocialUserController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::group(['middleware' => ['web', 'guest']], function () {
    Route::get('/auth/{provider}/redirect', [SocialSessionController::class, 'create'])->name('social.login');
    Route::get('/auth/{provider}/callback', [SocialSessionController::class, 'store']);

    Route::get('/register/{provider}', [RegisteredSocialUserController::class, 'index'])->name('social.register.approve');
    Route::get('/register/{provider}/redirect', [RegisteredSocialUserController::class, 'create'])->name('social.register');
    Route::get('/register/{provider}/callback', [RegisteredSocialUserController::class, 'store']);
});
