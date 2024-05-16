<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'account'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('login', [LoginController::class, 'index'])->name('account.login');
        Route::post('authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');
        Route::get('register', [LoginController::class, 'register'])->name('account.register');
        Route::post('process-register', [LoginController::class, 'processRegister'])->name('account.processRegister');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('logOut', [LoginController::class, 'logOut'])->name('account.logOut');
        Route::get('home', [HomeController::class, 'index'])->name('account.home');
    });
});

Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
    });

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('logout', [AdminLoginController::class, 'logOut'])->name('admin.logout');
        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    });
});
// Route::get('admin/login', [AdminLoginController::class, 'index'])->name('admin.login');
// Route::post('admin/authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
// Route::get('admin/logout', [AdminLoginController::class, 'logOut'])->name('admin.logOut');
// Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
