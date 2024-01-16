<?php

use App\Http\Controllers\Front\LoginController;
use App\Http\Controllers\Front\RegisterController;
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

    });
});
