<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::prefix('customer')->group(function () {
    Route::get('/login', [AuthController::class, 'customerLogin'])->name('customer.login');
    Route::post('/login/submit', [AuthController::class, 'customerLoginSubmit'])->name('customer.login.submit');

    Route::get('/register', [AuthController::class, 'customerRegister'])->name('customer.register');
    Route::post('register/submit', [AuthController::class, 'customerRegisterSubmit'])->name('customer.register.submit');

    Route::get('/generateOtp',[AuthController::class, 'generateOtp'])->name('generateOtp');
    Route::get('/logout', [AuthController::class, 'customerlogout'])->name('customer.logout');
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'adminLogin'])->name('admin.login');
    Route::post('/login/submit', [AuthController::class, 'adminLoginSubmit'])->name('admin.login.submit');
    Route::get('/logout', [AuthController::class, 'adminlogout'])->name('admin.logout');
});















// Route::group(function () {
// });



