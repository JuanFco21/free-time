<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\AdministratorController;
use App\Http\Controllers\Admin\DigitalLibraryController;
use App\Http\Controllers\Admin\AdministratorAuthController;

Route::controller(AdministratorAuthController::class)->group(function () {
    Route::post('login', 'create')->name('login');
    Route::get('logout', 'destroy')->name('logout');
});

Route::middleware('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('modulo-de-catalogos/categorias-biblioteca-digital', [CategoryController::class, 'index'])->name('category.index');
    Route::get('modulo-de-catalogos/categorias-biblioteca-digital/crear-categoria-biblioteca-digital', [CategoryController::class, 'create'])->name('category.create');
    Route::post('modulo-de-catalogos/categorias-biblioteca-digital/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('modulo-de-catalogos/categorias-biblioteca-digital/editar-categoria-biblioteca-digital/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('modulo-de-catalogos/categorias-biblioteca-digital/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('modulo-de-catalogos/categorias-biblioteca-digital/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    Route::get('modulo-de-usuarios/administradores', [AdministratorController::class, 'index'])->name('administrator.index');
    Route::get('modulo-de-usuarios/administradores/crear-administrador', [AdministratorController::class, 'create'])->name('administrator.create');
    Route::post('modulo-de-usuarios/administradores/store', [AdministratorController::class, 'store'])->name('administrator.store');
    Route::get('modulo-de-usuarios/administradores/editar-administrador/{id}', [AdministratorController::class, 'edit'])->name('administrator.edit');
    Route::put('modulo-de-usuarios/administradores/update/{id}', [AdministratorController::class, 'update'])->name('administrator.update');
    Route::delete('modulo-de-usuarios/administradores/delete/{id}', [AdministratorController::class, 'destroy'])->name('administrator.destroy');

    Route::get('modulo-de-usuarios/roles', [RoleController::class, 'index'])->name('role.index');
    Route::get('modulo-de-usuarios/roles/crear-role', [RoleController::class, 'create'])->name('role.create');
    Route::post('modulo-de-usuarios/roles/store', [RoleController::class, 'store'])->name('role.store');
    Route::get('modulo-de-usuarios/roles/editar-role/{id}', [RoleController::class, 'edit'])->name('role.edit');
    Route::put('modulo-de-usuarios/roles/update/{id}', [RoleController::class, 'update'])->name('role.update');
    Route::delete('modulo-de-usuarios/roles/delete/{id}', [RoleController::class, 'destroy'])->name('role.destroy');

    Route::get('modulo-de-usuarios/permisos', [PermissionController::class, 'index'])->name('permission.index');
    Route::get('modulo-de-usuarios/permisos/crear-permiso', [PermissionController::class, 'create'])->name('permission.create');
    Route::post('modulo-de-usuarios/permisos/store', [PermissionController::class, 'store'])->name('permission.store');
    Route::get('modulo-de-usuarios/permisos/editar-permiso/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::put('modulo-de-usuarios/permisos/update/{id}', [PermissionController::class, 'update'])->name('permission.update');
    Route::delete('modulo-de-usuarios/permisos/delete/{id}', [PermissionController::class, 'destroy'])->name('permission.destroy');

    Route::get('modulo-de-contenido/sobre-nosotros', [AboutController::class, 'index'])->name('about.index');
    Route::put('modulo-de-contenido/sobre-nosotros', [AboutController::class, 'update'])->name('about.update');

    Route::get('modulo-de-publicaciones/biblioteca-digital', [DigitalLibraryController::class, 'index'])->name('digital_library.index');
    Route::get('modulo-de-publicaciones/biblioteca-digital/crear-biblioteca-digital', [DigitalLibraryController::class, 'create'])->name('digital_library.create');
    Route::post('modulo-de-publicaciones/biblioteca-digital/store', [DigitalLibraryController::class, 'store'])->name('digital_library.store');
    Route::get('modulo-de-publicaciones/biblioteca-digital/editar-biblioteca-digital/{id}', [DigitalLibraryController::class, 'edit'])->name('digital_library.edit');
    Route::put('modulo-de-publicaciones/biblioteca-digital/update/{id}', [DigitalLibraryController::class, 'update'])->name('digital_library.update');
    Route::delete('modulo-de-publicaciones/biblioteca-digital/delete/{id}', [DigitalLibraryController::class, 'destroy'])->name('digital_library.destroy');
});
