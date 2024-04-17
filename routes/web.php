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

    Route::get('/apprved/{id}', [adminController::class, 'approved'])->name('admin.approved');
    Route::get('/reject/{id}', [adminController::class, 'reject'])->name('admin.reject');
    Route::get('/edit/{id}', [adminController::class, 'edit'])->name('admin.edit');
    Route::post('/edit/submit/{id}', [adminController::class, 'editSubmit'])->name('admin.submit.edit');

});






