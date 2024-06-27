<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WriterPostController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\BlockAccess;

Route::middleware([BlockAccess::class])->group(function () {
    Route::controller(UserController::class)
        ->prefix('users')
        ->group(function () {
            Route::get('/reader', 'indexreader')->name('indexreader');
            Route::get('/writer', 'indexwriter')->name('indexwriter');
            Route::get('/subadmin', 'indexsubadmin')->name('indexsubadmin');
            Route::get('/createreader', 'createreader')->name('createreader');
            Route::post('/createreader', 'storereader')->name('storereader');
            Route::get('/createwriter', 'createwriter')->name('createwriter');
            Route::post('/createwriter', 'storewriter')->name('storewriter');
            Route::get('/createsubadmin', 'createsubadmin')->name('createsubadmin');
            Route::post('/createsubadmin', 'storesubadmin')->name('storesubadmin');
            Route::get('/searchreader', 'searchreader')->name('searchreader');
            Route::get('/searchwriter', 'searchwriter')->name('searchwriter');
            Route::get('/searchsubadmin', 'searchsubadmin')->name('searchsubadmin');

            Route::prefix('{userId}')
                ->group(function () {
                    Route::get('/showreader', 'showreader')->name('showreader');
                    Route::get('/showwriter', 'showwriter')->name('showwriter');
                    Route::get('/showsubadmin', 'showsubadmin')->name('showsubadmin');
                    Route::get('/editreader', 'editreader')->name('editreader');
                    Route::patch('/updatereader', 'updatereader')->name('updatereader');
                    Route::get('/editwriter', 'editwriter')->name('editwriter');
                    Route::patch('/updatewriter', 'updatewriter')->name('updatewriter');
                    Route::get('/editsubadmin', 'editsubadmin')->name('editsubadmin');
                    Route::patch('/updatesubadmin', 'updatesubadmin')->name('updatesubadmin');
                    Route::delete('/deletereader', 'destroyreader')->name('destroyreader');
                    Route::delete('/deletewriter', 'destroywriter')->name('destroywriter');
                    Route::delete('/deletesubadmin', 'destroysubadmin')->name('destroysubadmin');
                    Route::post('/change-reader-to-writer', 'changeReaderToWriter')->name('changeReaderToWriter');
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

    Route::controller(PostController::class)
        ->prefix('')
        ->group(function () {
            Route::get('/', 'indexpost')->name('indexpost');
        });

    Route::controller(PostController::class)
        ->prefix('post')
        ->group(function () {
            Route::get('/create', 'createpost')->name('createpost');
            Route::post('/create', 'storepost')->name('storepost');
            Route::get('/Detail', 'Detail')->name('Detail');
            Route::post('/upload', 'upload')->name('ckeditor.upload');
            Route::get('/manage', 'managePosts')->name('managePosts');
            Route::prefix('{postId}')
                ->group(function () {
                    Route::get('/postDetail', 'postDetail')->name('postDetail');
                    Route::get('/showPost', 'showPost')->name('showPost');
                    Route::get('/editpostForm', 'editpostForm')->name('editpostForm');
                    Route::put('/editpost', 'editpost')->name('editpost');
                    Route::post('/deletepost', 'deletepost')->name('deletepost');
                });
        });

    Route::controller(HomeController::class)
        ->prefix('admin')
        ->group(function () {
            Route::get('/', 'dashboard')->name('dashboard');
        });

    Route::controller(CategoryController::class)
        ->prefix('category')
        ->group(function () {
            Route::get('/', 'getAllCategory')->name('getAllCategory');
            Route::get('/createcategory', 'createcategoryform')->name('createcategoryform');
            Route::post('/createcategory', 'createcategory')->name('createcategory');
            Route::get('/editcategory/{categoryId}', 'editcategoryform')->name('editcategoryform');
            Route::put('/editcategory/{categoryId}', 'editcategory')->name('editcategory');
        });

    Route::controller(WriterPostController::class)
        ->prefix('write')
        ->group(function () {
            Route::get('/', 'profile')->name('profile');
            Route::get('/managewrite', 'managewrite')->name('managewrite');
            Route::prefix('post')
                ->group(function () {
                    Route::get('/create', 'createpostwriter')->name('createpostwriter');
                    Route::post('/create', 'storepostwrite')->name('storepostwrite');
                    Route::get('/Detail', 'Detail')->name('Detailwrite');
                    Route::post('/upload', 'upload')->name('ckeditor.upload');
                    Route::prefix('{postId}')
                        ->group(function () {
                            Route::get('/postDetail', 'postDetail')->name('postDetail');
                            Route::get('/showPost', 'showPost')->name('showPost');
                            Route::get('/editpostForm', 'editpostForm')->name('editpostForm');
                            Route::put('/editpost', 'editpost')->name('editpost');
                            Route::post('/deletepost', 'deletepost')->name('deletepost');
                        });
                });
        });

    Route::controller(ProfileController::class)
        ->prefix('account')
        ->group(function () {
            Route::get('/myprofile', 'showUserProfile')->name('showUserProfile');
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

        Route::controller(PostController::class)
        ->prefix('')
        ->group(function () {
            Route::get('/', 'indexpost')->name('indexpost');
        });
