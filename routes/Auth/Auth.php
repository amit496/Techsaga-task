<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::middleware(['redirectif'])->prefix('customer')->group(function () {
    Route::get('/login', [AuthController::class, 'customerLogin'])->name('customer.login');
    Route::post('/login/submit', [AuthController::class, 'customerLoginSubmit'])->name('customer.login.submit');

    Route::get('/register', [AuthController::class, 'customerRegister'])->name('customer.register');
    Route::post('register/submit', [AuthController::class, 'customerRegisterSubmit'])->name('customer.register.submit');

    Route::get('/generateOtp',[AuthController::class, 'generateOtp'])->name('generateOtp');
});

Route::get('customer/logout', [AuthController::class, 'customerlogout'])->name('customer.logout');


Route::middleware(['redirectadminif'])->prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'adminLogin'])->name('admin.login');
    Route::post('/login/submit', [AuthController::class, 'adminLoginSubmit'])->name('admin.login.submit');

});

Route::get('admin/logout', [AuthController::class, 'adminlogout'])->name('admin.logout');














// Route::group(function () {
// });



