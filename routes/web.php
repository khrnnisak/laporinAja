<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PelaporController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\FeedbackController;
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

Route::get('/', function () {
    return view('landing');
});

Route::group(['prefix' => '/admin'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('admin')->middleware('admin');
    Route::get('/dataPengguna', [AdminController::class, 'showPengguna'])->name('admin.showPengguna')->middleware('admin');
    Route::get('/dataLaporan', [AdminController::class, 'showLaporan'])->name('admin.showLaporan')->middleware('admin');
    Route::get('/showDetail/{id}', [AdminController::class, 'showDetailLaporan'])->name('showDetailLaporan')->middleware('admin');
    Route::put('/status/{id}', [AdminController::class, 'status'])->name('admin.status')->middleware('admin');
    Route::get('/createFeedback/{id}', [FeedbackController::class, 'create'])->name('feedback.create')->middleware('admin');
    Route::post('/addFeedback/{id}', [FeedbackController::class, 'store'])->name('addFeedback')->middleware('admin');
    Route::get('/showFeedback/{id}', [FeedbackController::class, 'show'])->name('showFeedback')->middleware('admin');
    Route::get('/profilAdmin', [AdminController::class, 'show'])->name('admin.profil')->middleware('admin');
    Route::delete('/delete/{id}', [AdminController::class, 'destroy'])->name('admin.destroy')->middleware('admin');
    Route::delete('/deleteLaporan/{id}', [AdminController::class, 'destroyLaporan'])->name('admin.destroyLaporan')->middleware('admin');
});

Route::group(['prefix' => '/user'], function(){
    Route::get('/', [HomeController::class, 'index'])->name('user')->middleware('user');
    Route::get('/lengkap', [PelaporController::class, 'create'])->name('lengkap')->middleware('user');
    Route::post('/lengkapi', [PelaporController::class, 'store'])->name('lengkapi')->middleware('user');
    Route::get('/edit', [PelaporController::class, 'edit'])->name('edit')->middleware('user');
    Route::post('/simpanedit', [PelaporController::class, 'update'])->name('simpanedit')->middleware('user');
    Route::get('/profil', [PelaporController::class, 'show'])->name('profil')->middleware('user');
    Route::get('/buatLaporan', [LaporanController::class, 'create'])->name('buatLaporan')->middleware('user');
    Route::post('/laporkan', [LaporanController::class, 'store'])->name('laporkan')->middleware('user');
    Route::get('/riwayatLaporan', [LaporanController::class, 'show'])->name('riwayatLaporan')->middleware('user');
    Route::get('/showDetail/{id}', [LaporanController::class, 'showDetail'])->name('showDetail')->middleware('user');
    Route::get('/feedback/{id}', [LaporanController::class, 'showFeedback'])->name('feedback')->middleware('user');
    Route::put('/ratePuas/{id}', [LaporanController::class, 'statusFB'])->name('ratePuas')->middleware('user');
    Route::delete('/delete/{id}', [LaporanController::class, 'destroy'])->name('user.destroy')->middleware('user');
   
});

Route::get('logout', [LoginController::class, 'logout']);


