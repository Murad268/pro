<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PointsOfSalesController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\LoginController;
use App\Http\Controllers\Front\LogoutController;
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
    Route::group(['prefix' => '', 'as' => 'auth.', 'middleware' => "auth.redirect"], function () {
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


    Route::group(['prefix' => '', 'as' => 'client.', 'middleware' => "auth"], function () {
        Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
        Route::get('/', [HomeController::class, 'index'])->name('home');
    });
});


Route::group(['prefix' => LaravelLocalization::setLocale() . 'admin', 'as' => 'admin.'], function () {
    Route::group(['prefix' => '', 'as' => 'admin.'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');


        Route::resource('/points_of_sales', PointsOfSalesController::class);
        Route::post('/points_of_sales/ids_proccess', [PointsOfSalesController::class, 'ids_proccess'])->name('points_of_sales.ids_proccess');


        Route::get('/points_of_sales-search', [PointsOfSalesController::class, 'search'])->name('ids_proccess.search');



        Route::resource('/products', ProductsController::class);
        Route::post('/products/ids_proccess', [ProductsController::class, 'ids_proccess'])->name('products.ids_proccess');
        Route::get('/products-search', [ProductsController::class, 'search'])->name('products.search');





        Route::get('/product/{slug}', [ProductController::class, 'index'])->name('product.index');
        Route::get('/product_statistic/create/{slug}', [ProductController::class, 'create'])->name('product.create');
        Route::post('/product_statistic/store/{slug}', [ProductController::class, 'store'])->name('product.store');
        Route::post('/product_statistic/ids_proccess/{slug}', [ProductController::class, 'ids_proccess'])->name('product.ids_proccess');
        Route::post('/product_statistic/destroy/{slug}', [ProductController::class, 'destroy'])->name('product.destroy');

        Route::get('/product_statistic/search/{slug}', [ProductController::class, 'search'])->name('product.search');


        Route::get('/product_statistic/for_shops/{slug}', [ProductController::class, 'for_shops'])->name('product.for_shops');

        Route::get('/product_statistic/for_data/{slug}', [ProductController::class, 'for_data'])->name('product.for_data');


    });
});
