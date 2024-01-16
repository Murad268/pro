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
        Route::get('/login', [LoginController::class, 'index'])->name('login');
        Route::get('/register', [RegisterController::class, 'index'])->name('register');
        Route::post('/sign_in', [RegisterController::class, 'register'])->name('sign_in');
        Route::get('/mainActivation', [RegisterController::class, 'activate'])->name('activate');
    });
});
