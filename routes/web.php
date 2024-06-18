<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;


Route::controller(UserController::class)
    ->prefix('users')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');
        Route::get('/search', 'search')->name('search');
        Route::prefix('{userId}')
            ->group(function () {
                Route::get('/show', 'show')->name('show');
                Route::get('/edit', 'edit')->name('edit');
                Route::patch('/update', 'update')->name('update');
                Route::delete('/delete', 'destroy')->name('destroy');
            });
    });

Route::controller(RegisterController::class)
    ->prefix('auth')
    ->group(function () {
        Route::get('/sign-up', 'signUp')->name('signUp');
        Route::post('/sign-up', 'sendEmail')->name('sendEmail');
        Route::get('/waiting', 'waiting')->name('waiting');
        Route::get('/temporary', 'temporary')->name('temporary');
        Route::post('/temporary', 'register')->name('register');
        Route::get('/login', 'login')->name('login');
        Route::post('/signIn', 'signIn')->name('signIn');
        Route::get('/logout', 'logout')->name('logout');
        Route::get('/forgot-password', 'forgotPasswordForm')->name('forgotPasswordForm');
        Route::post('/forgot-password', 'forgotPassword')->name('forgotPassword');
        Route::get('/verify-otp', 'verifyOTPForm')->name('verifyOTPForm');
        Route::post('/verify-otp', 'verifyOTP')->name('verifyOTP');
        Route::get('/reset-password', 'resetPasswordForm')->name('resetPasswordForm');
        Route::post('/reset-password', 'resetPassword')->name('resetPassword');
    });

Route::controller(HomeController::class)
    ->prefix('')
    ->group(function () {
        Route::get('/', 'home')->name('home');
    });

Route::controller(PostController::class)
    ->prefix('post')
    ->group(function () {
        Route::get('/', 'indexpost')->name('indexpost');
        Route::get('/create', 'createpost')->name('createpost');
        Route::post('/create', 'storepost')->name('storepost');
        Route::get('/postDetail', 'postDetail')->name('postDetail');
        Route::post('/upload', 'upload')->name('ckeditor.upload');
        Route::prefix('{id}')
            ->group(function () {
                Route::get('/showPost', 'showPost')->name('showPost');
            });
    });
