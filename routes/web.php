<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\profileController;
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

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/register', [LoginController::class, 'store']);
Route::get('/logout', [LoginController::class, 'destroy']);
Route::post('/login-proses', [LoginController::class, 'login'])->name('login-proses');
Route::get('/Akun', function () {
    return view('auth.register');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [BerandaController::class, 'index']);
    Route::get('/profile', [profileController::class, 'index']);
    Route::get('/foto', [profileController::class, 'foto']);
    Route::get('/createFoto', [profileController::class, 'create']);
    Route::post('/unggah', [profileController::class, 'store']);
    Route::post('/album', [profileController::class, 'procedureAlbum']);
    Route::post('/editProfile', [profileController::class, 'edit']);
    Route::post('/editProfil', [profileController::class, 'update']);
    Route::get('{id}/destroy', [profileController::class, 'deleteFoto']);
    Route::get('EditAlbum/{id}', [profileController::class, 'EditAlbum']);
    Route::post('tambahGambar/{id}', [profileController::class, 'tambahGambar']);
    Route::post('keteranganFoto/{id}', [profileController::class, 'keterangan']);
    Route::post('Like/{id}', [BerandaController::class, 'like']);
    Route::get('lihatAlbum/{id}', [BerandaController::class, 'lihatAlbum']);
    Route::post('komen', [BerandaController::class, 'komen']);
    Route::post('cariFoto', [BerandaController::class, 'Pencarian']);
    Route::get('User/{id}', [BerandaController::class, 'Pengguna']);
    Route::get('Laporan',[BerandaController::class,'Laporan']);
    Route::post('hapuskomen',[BerandaController::class,'hapuskomen']);
    Route::get('like/{id}',[BerandaController::class,'like']);
    Route::get('deleteAlbum/{id}',[BerandaController::class,'deleteAlbum']);
    Route::get('keteranganKeranjang/{id}',[BerandaController::class,'editKeranjang']);
    Route::post('hapusProfile',[profileController::class,'hapusProfile']);
});
