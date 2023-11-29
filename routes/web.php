<?php

use App\Http\Controllers\login;
use App\Http\Controllers\prodak;
use App\Http\Controllers\register;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\transaksiCon;
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
Route::get('/', [prodak::class, 'home']);

Route::get('/transaksi/tampil', [transaksiCon::class, 'index'])->name('indextransaksi')->middleware('auth');
Route::get('/transaksi/input', [transaksiCon::class, 'input'])->name('inputtransaksi')->middleware('auth');
Route::post('/transaksi/storeinput', [transaksiCon::class, 'storeinput'])->name('storeInputtransaksi')->middleware('auth');
Route::get('/transaksi/update/{id}', [transaksiCon::class, 'update'])->name('updatetransaksi')->middleware('auth');
Route::post('/transaksi/storeupdate', [transaksiCon::class, 'storeupdate'])->name('storeUpdatetranksi')->middleware('auth');
Route::get('/transaksi/delete/{id}', [transaksiCon::class, 'delete'])->name('deletetransaksi')->middleware('auth');
Route::get('/transaksi/upload', [transaksiCon::class, 'upload'])->name('upload')->middleware('auth');
Route::post('/transaksi/uploadproses', [transaksiCon::class, 'uploadproses'])->name('uploadproses')->middleware('auth');

Route::get('/prodak/tampil', [prodak::class, 'index'])->name('indexprodak')->middleware('auth');
Route::get('/prnter/input', [prodak::class, 'input'])->name('inputprodak')->middleware('auth');
Route::post('/prodak/storeinput', [prodak::class, 'storeinput'])->name('storeInputprodak')->middleware('auth');
Route::get('/prodak/update/{id}', [prodak::class, 'update'])->name('updateprodak')->middleware('auth');
Route::post('/prodak/storeupdate', [prodak::class, 'storeupdate'])->name('storeUpdateprodak')->middleware('auth');
Route::get('/prodak/delete/{id}', [prodak::class, 'delete'])->name('deleteprodak')->middleware('auth');
Route::get('/prodak/upload', [prodak::class, 'upload'])->name('upload')->middleware('auth');
Route::post('/prodak/uploadproses', [prodak::class, 'uploadproses'])->name('uploadproses')->middleware('auth');

Route::get('/login', [login::class, 'login'])->name('login');
Route::post('actionlogin', [login::class, 'actionlogin'])->name('actionlogin');
Route::get('dashboard', [Dashboard::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('actionlogout', [login::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
Route::get('register', [register::class, 'register'])->name('register');
Route::post('register/action', [register::class, 'actionregister'])->name('actionregister');