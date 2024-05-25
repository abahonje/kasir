<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Authentication
Route::get('/', [UserController::class, 'login'])->middleware('guest')->name('login');
Route::post('/login', [UserController::class, 'authenticate']);
Route::get('/logout', [UserController::class, 'logout']);
// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
// Pengelolan User
Route::get('/user', [UserController::class, 'index'])->middleware(['auth', 'isadmin']);
Route::get('/user/create', [UserController::class, 'create'])->middleware(['auth', 'isadmin']);
Route::get('/user/edit/{user}', [UserController::class, 'edit'])->middleware(['auth', 'isadmin']);
Route::post('/user', [UserController::class, 'store'])->middleware(['auth', 'isadmin']);
Route::put('/user', [UserController::class, 'update'])->middleware(['auth', 'isadmin']);
Route::delete('/user', [UserController::class, 'destroy'])->middleware(['auth', 'isadmin']);
// Pengelolaan Supplier
Route::get('/supplier', [SupplierController::class, 'index'])->middleware(['auth', 'isadmin']);
Route::get('/supplier/create', [SupplierController::class, 'create'])->middleware(['auth', 'isadmin']);
Route::post('/supplier', [SupplierController::class, 'store'])->middleware(['auth', 'isadmin']);
Route::get('/supplier/edit/{supplier}', [SupplierController::class, 'edit'])->middleware(['auth', 'isadmin']);
Route::put('/supplier', [SupplierController::class, 'update'])->middleware(['auth', 'isadmin']);
Route::delete('/supplier', [SupplierController::class, 'destroy'])->middleware(['auth', 'isadmin']);
// Pengelolaan Jenis Barang
Route::get('/jenis', [JenisController::class, 'index'])->middleware(['auth', 'isadmin']);
Route::post('/jenis', [JenisController::class, 'store'])->middleware(['auth', 'isadmin']);
Route::post('/getjenis', [JenisController::class, 'show'])->middleware(['auth', 'isadmin']);
Route::post('/jenis/{jenis}', [JenisController::class, 'update'])->middleware(['auth', 'isadmin']);
Route::delete('/jenis', [JenisController::class, 'destroy'])->middleware(['auth', 'isadmin']);
// Pengelolaan Barang
Route::get('/barang', [BarangController::class, 'index'])->middleware(['auth', 'isadmin']);
Route::get('/barang/create', [BarangController::class, 'create'])->middleware(['auth', 'isadmin']);
