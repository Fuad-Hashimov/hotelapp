<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;




Route::get('/customer',[CustomerController::class,'index'])->name('customer_show');
Route::get('/customer/create',[CustomerController::class,'create'])->name('customer_create');
Route::get('/customer/show/{id}',[CustomerController::class,'show'])->name('customer_show');
Route::get('/customer/delete/{id}',[CustomerController::class,'destroy'])->name('customer_destroy');


Route::post('/customer/update/{id}',[CustomerController::class,'update'])->name('customer_update');
Route::post('/customer',[CustomerController::class,'store'])->name('customer_store');





Route::get('/',[HomeController::class,'index'])->name('welcome');
Route::get('/about',[HomeController::class,'about'])->name('about');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');

Route::group(['prefix' => 'account'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('login', [LoginController::class, 'index'])->name('account.login');
        Route::post('authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');
        Route::get('register', [LoginController::class, 'register'])->name('account.register');
        Route::post('process-register', [LoginController::class, 'processRegister'])->name('account.processRegister');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('logOut', [LoginController::class, 'logOut'])->name('account.logOut');
        Route::get('hotel', [HotelController::class, 'index'])->name('account.hotel');
    });
});

Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
    });

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('logout', [AdminLoginController::class, 'logOut'])->name('admin.logout');
        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('blank', [DashboardController::class, 'blank'])->name('admin.blank');
        Route::get('calendar', [DashboardController::class, 'calendar'])->name('admin.calendar');
        Route::get('forms', [DashboardController::class, 'forms'])->name('admin.forms');
        Route::get('tables', [DashboardController::class, 'tables'])->name('admin.tables');
        Route::get('tabs', [DashboardController::class, 'tabs'])->name('admin.tabs');
    });
});















