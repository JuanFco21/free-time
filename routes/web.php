<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('frontend.home');

Route::get('/biblioteca-digital/{slug}', [HomeController::class, 'digitalLibraries'])->name('frontend.digital_library');

Route::get('/iniciar-sesion', [HomeController::class, 'login'])->name('frontend.login');
