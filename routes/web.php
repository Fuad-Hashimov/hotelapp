<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

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
 
