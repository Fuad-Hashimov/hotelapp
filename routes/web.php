<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\admin\HotelController;
use App\Http\Controllers\admin\RoomController;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\LoginController;

use Illuminate\Support\Facades\Route;




Route::get('/customer', [CustomerController::class, 'index'])->name('customer_show');
Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer_create');
Route::get('/customer/edit/{customer}', [CustomerController::class, 'edit'])->name('customer_edit');

Route::delete('/customer/delete/{id}', [CustomerController::class, 'destroy'])->name('customer_destroy');
Route::put('/customer/update/{id}', [CustomerController::class, 'update'])->name('customer_update');
Route::post('/customer', [CustomerController::class, 'store'])->name('customer_store');





Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::group(['prefix' => 'account'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('login', [LoginController::class, 'index'])->name('account.login');
        Route::post('authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');
        Route::get('register', [LoginController::class, 'register'])->name('account.register');
        Route::post('process-register', [LoginController::class, 'processRegister'])->name('account.processRegister');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('logOut', [LoginController::class, 'logOut'])->name('account.logOut');
        // Route::get('hotel', [HotelController::class, 'index'])->name('account.hotel');
    });
});

// require base_path('AdminRoutes/adminRoute.php');

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

        // Hotel Routes
        Route::prefix('hotel')->group(function () {
            Route::get('/', [HotelController::class, 'index'])->name('admin.hotel.index');
            Route::post('/', [HotelController::class, 'store'])->name('admin.hotel.store');
            Route::get('edit/{id}', [HotelController::class, 'edit'])->name('admin.hotel.edit');
            Route::put('update/{id}', [HotelController::class, 'update'])->name('admin.hotel.update');
            Route::delete('{id}', [HotelController::class, 'destroy'])->name('admin.hotel.destroy');
        });

        Route::prefix('room')->group(function(){
            Route::get('/',[RoomController::class,'index'])->name('admin.room.index');
            Route::get('edit/{id}',[RoomController::class,'edit'])->name('admin.room.edit');
        });


    });
});
