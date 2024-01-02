<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KambingController;
use App\Http\Controllers\KandangController;
use App\Http\Controllers\RoleController;
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

Route::get('/', function () {
    return view('landing-page');
});
// login
Route::get('/login',[LoginController::class, 'login'])->name('login');
Route::post('/doLogin',[LoginController::class,'doLogin'])->name('doLogin');
// logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// user manajemen route
Route::get('/user',[UserController::class, 'index'])->name('user.index');
Route::post('/user/store',[UserController::class, 'store'])->name('user.store');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}/update',[UserController::class,'update'])->name('user.update');
Route::get('/user/{id}/destroy', [UserController::class, 'delete'])->name('user.delete');

// role Manajemen
Route::get('/role',[RoleController::class,'index'])->name('role.index');
Route::post('/role/store',[RoleController::class,'store'])->name('role.store');
Route::get('/role/{id}/edit',[RoleController::class, 'edit'])->name('role.edit');
Route::put('/role/{id}/update',[RoleController::class, 'update'])->name('role.update');
Route::get('/role/{id}/destroy',[RoleController::class, 'destroy'])->name('role.destroy');

// manajemen Kandang
Route::get('/kandang',[KandangController::class, 'index'])->name('kandang.index');
Route::post('/kandang/store', [KandangController::class, 'store'])->name('kandang.store');
Route::get('/kandang/{id}/edit',[KandangController::class, 'edit'])->name('kandang.edit');
Route::put('/kandang/{id}/update', [KandangController::class,'update'])->name('kandang.update');
Route::get('/kandang/{id}/destroy',[KandangController::class,'delete'])->name('delete.kandang');

// manajemen kambing
Route::get('/kambing', [KambingController::class, 'index'])->name('kambing.index');
Route::post('/kambing/store', [KambingController::class, 'store'])->name('kambing.store');
