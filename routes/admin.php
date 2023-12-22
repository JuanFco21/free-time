<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdministratorAuthController;
use App\Http\Controllers\Admin\AdministratorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;

Route::controller(AdministratorAuthController::class)->group(function () {
    Route::post('login', 'create')->name('login');
    Route::get('logout', 'destroy')->name('logout');
});

Route::middleware('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware('admin')->group(function () {
    Route::get('modulo-de-usuarios/administradores', [AdministratorController::class, 'index'])->name('administrator.index'); //Rutas para seccion de usuarios
    Route::get('modulo-de-usuarios/administradores/crear-administrador', [AdministratorController::class, 'create'])->name('administrator.create');
    Route::post('modulo-de-usuarios/administradores/store', [AdministratorController::class, 'store'])->name('administrator.store');
    Route::get('modulo-de-usuarios/administradores/editar-administrador/{id}', [AdministratorController::class, 'edit'])->name('administrator.edit');
    Route::put('modulo-de-usuarios/administradores/update/{id}', [AdministratorController::class, 'update'])->name('administrator.update');
    Route::delete('modulo-de-usuarios/administradores/delete/{id}', [AdministratorController::class, 'destroy'])->name('administrator.destroy');

    Route::get('modulo-de-usuarios/roles', [RoleController::class, 'index'])->name('role.index'); //Rutas para seccion de roles
    Route::get('modulo-de-usuarios/roles/crea-role', [RoleController::class, 'create'])->name('role.create');
    Route::post('modulo-de-usuarios/roles/store', [RoleController::class, 'store'])->name('role.store');
    Route::get('modulo-de-usuarios/roles/editar-role/{id}', [RoleController::class, 'edit'])->name('role.edit');
    Route::put('modulo-de-usuarios/roles/update/{id}', [RoleController::class, 'update'])->name('role.update');
    Route::delete('modulo-de-usuarios/roles/delete/{id}', [RoleController::class, 'destroy'])->name('role.destroy');

    Route::get('modulo-de-usuarios/permisos', [PermissionController::class, 'index'])->name('permission.index');  //Rutas para seccion de permisos
    Route::get('modulo-de-usuarios/permisos/crea-permiso', [PermissionController::class, 'create'])->name('permission.create');
    Route::post('modulo-de-usuarios/permisos/store', [PermissionController::class, 'store'])->name('permission.store');
    Route::get('modulo-de-usuarios/permisos/editar-permiso/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::put('modulo-de-usuarios/permisos/update/{id}', [PermissionController::class, 'update'])->name('permission.update');
    Route::delete('modulo-de-usuarios/permisos/delete/{id}', [PermissionController::class, 'destroy'])->name('permission.destroy');
});
