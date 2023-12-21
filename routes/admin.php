<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdministratorAuthController;
use App\Http\Controllers\Admin\DashboardController;

Route::controller(AdministratorAuthController::class)->group(function () {
    Route::post('login', 'create')->name('login');
    Route::get('logout', 'destroy')->name('logout');
});

Route::middleware('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});