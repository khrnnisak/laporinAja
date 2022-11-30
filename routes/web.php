<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PelaporController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::Routes();

Route::group(['prefix' => '/admin'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('admin')->middleware('admin');
    //Route::get('/index', [AdminController::class, 'index'])->name('admin.index')->middleware('admin');
    // Route::get('/create', [AdminController::class, 'create'])->name('admin.create')->middleware('admin');
    // Route::post('/create/user', [AdminController::class, 'store'])->name('admin.store')->middleware('admin');
    // //Route::get('/search', [AdminController::class, 'search'])->name('admin.search')->middleware('admin');
    // Route::get('/show/{id}', [AdminController::class, 'show'])->name('admin.show')->middleware('admin');
    // Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit')->middleware('admin');
    // Route::put('/update/{id}', [AdminController::class, 'update'])->name('admin.update')->middleware('admin');
    // Route::get('/go/{id}', [AdminController::class, 'go'])->name('admin.go')->middleware('admin');
    // Route::put('/status/{id}', [AdminController::class, 'status'])->name('admin.status')->middleware('admin');
    // Route::delete('/delete/{id}', [AdminController::class, 'destroy'])->name('admin.destroy')->middleware('admin');
    // //Route::get('/data/user', [UserController::class, 'index'])->name('index')->middleware('admin'); //kenapa malah nampilkan create form pendaftaran?
});

Route::group(['prefix' => '/user'], function(){
    Route::get('/', [HomeController::class, 'index'])->name('user')->middleware('user');
    Route::get('/lengkap', [PelaporController::class, 'create'])->name('lengkap')->middleware('user');
    Route::post('/lengkapi', [PelaporController::class, 'store'])->name('lengkapi')->middleware('user');
    Route::get('/edit', [PelaporController::class, 'edit'])->name('edit')->middleware('user');
    Route::post('/simpanedit', [PelaporController::class, 'update'])->name('simpanedit')->middleware('user');
    Route::get('/profil', [PelaporController::class, 'show'])->name('profil')->middleware('user');
    // Route::get('/cetak_formulir', [PendaftarController::class, 'cetak_formulir'])->name('cetak_formulir')->middleware('user');
});

Route::get('logout', [LoginController::class, 'logout']);


