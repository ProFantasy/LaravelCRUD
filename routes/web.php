<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\RegistrasiController;

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

Route::get('/', [LoginController::class,'index'])->name('login')->middleware('guest');

Route::get('input-mahasiswa', [MahasiswaController::class,'index'])->middleware('auth');
Route::post('kirim-mahasiswa', [MahasiswaController::class, 'store'])->middleware('auth');
Route::get('delete-mahasiswa/{nim}',[MahasiswaController::class,'delete'])->middleware('auth');
Route::get('edit-mahasiswa/{nim}',[MahasiswaController::class,'edit'])->middleware('auth');
Route::get('show-data-mahasiswa',[MahasiswaController::class,'show'])->middleware('auth');
Route::post('update-mahasiswa/{nim}',[MahasiswaController::class,'update'])->middleware('auth');

Route::post('login',[LoginController::class,'login'])->middleware('guest');

Route::get('registrasi',[RegistrasiController::class,'index'])->middleware('guest');
Route::post('registrasi',[RegistrasiController::class,'registrasi'])->middleware('guest');

Route::get('logout',[LoginController::class,'logout'])->middleware('auth');