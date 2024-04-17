<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;

include 'Auth\Auth.php';


Route::redirect('/', '/customer/login', 301);


Route::prefix('customer')->group(function () {
    Route::get('/dashboard', [CustomerController::class, 'customerDashboard'])->name('customer.dashboard');
    Route::get('/profile', [CustomerController::class, 'customerProfile'])->name('customer.profile');
});


Route::prefix('admin')->group(function () {

    Route::get('/admin/dashboard', [adminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/customer/list', [adminController::class, 'customerList'])->name('admin.customerlist');
});






