<?php

namespace routes\AdminRoutes;

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\admin\HotelController;
use Illuminate\Support\Facades\Route;

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

        Route::get('tables', [DashboardController::class, 'tables'])->name('admin.tables');
        Route::get('tabs', [DashboardController::class, 'tabs'])->name('admin.tabs');

        //Hotel Routes
        Route::get('hotel', [HotelController::class, 'index'])->name('admin.hotel.index');
        Route::post('hotel',[HotelController::class,'store'])->name('admin.hotel.store');
        Route::get('hotel/edit/{id}',[HotelController::class,'edit'])->name('admin.hotel.edit');
        Route::put('hotel/update/{id}',[HotelController::class,'update'])->name('admin.hotel.update');
        Route::delete('hotel/{id}', [HotelController::class, 'destroy'])->name('admin.hotel.destroy');
    });
});
