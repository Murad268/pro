<?php

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\LoginController;
use App\Http\Controllers\Front\RegisterController;
use App\Http\Controllers\Front\ResetPasswordController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(['prefix' => LaravelLocalization::setLocale() . '', 'as' => 'front.'], function () {
    Route::group(['prefix' => '', 'as' => 'auth.'], function () {
        Route::get('/register', [RegisterController::class, 'index'])->name('register');
        Route::post('/signup', [RegisterController::class, 'register'])->name('signup');
        Route::get('/mainActivation', [RegisterController::class, 'activate'])->name('activate');
        Route::get('/login', [LoginController::class, 'index'])->name('login');
        Route::get('/signin', [LoginController::class, 'login'])->name('signin');
        Route::get('/reset-password-enter-email', [ResetPasswordController::class, 'reset_pass_email'])->name('reset_pass_email');
        Route::get('/reset-password', [ResetPasswordController::class, 'reset_pass_open_reset'])->name('reset_pass_open_reset');
        Route::get('/new-password', [ResetPasswordController::class, 'new_password'])->name('new_password');
        Route::post('/add_new_password', [ResetPasswordController::class, 'add_new_password'])->name('add_new_password');
    });


    Route::group(['prefix' => '', 'as' => 'client.'], function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');
    });
});
