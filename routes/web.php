<?php

use App\Http\Controllers\login;
use App\Http\Controllers\printer;
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
Route::get('/', [printer::class, 'home']);

Route::get('/transaksi/tampil', [transaksiCon::class, 'index'])->name('indextransaksi')->middleware('auth');
Route::get('/transaksi/input', [transaksiCon::class, 'input'])->name('inputtransaksi')->middleware('auth');
Route::post('/transaksi/storeinput', [transaksiCon::class, 'storeinput'])->name('storeInputtransaksi')->middleware('auth');
Route::get('/transaksi/update/{id}', [transaksiCon::class, 'update'])->name('updatetransaksi')->middleware('auth');
Route::post('/transaksi/storeupdate', [transaksiCon::class, 'storeupdate'])->name('storeUpdatetranksi')->middleware('auth');
Route::get('/transaksi/delete/{id}', [transaksiCon::class, 'delete'])->name('deletetransaksi')->middleware('auth');
Route::get('/transaksi/upload', [transaksiCon::class, 'upload'])->name('upload')->middleware('auth');
Route::post('/transaksi/uploadproses', [transaksiCon::class, 'uploadproses'])->name('uploadproses')->middleware('auth');

Route::get('/printer/tampil', [printer::class, 'index'])->name('indexprinter')->middleware('auth');
Route::get('/prnter/input', [printer::class, 'input'])->name('inputprinter')->middleware('auth');
Route::post('/printer/storeinput', [printer::class, 'storeinput'])->name('storeInputprinter')->middleware('auth');
Route::get('/printer/update/{id}', [printer::class, 'update'])->name('updateprinter')->middleware('auth');
Route::post('/printer/storeupdate', [printer::class, 'storeupdate'])->name('storeUpdateprinter')->middleware('auth');
Route::get('/printer/delete/{id}', [printer::class, 'delete'])->name('deleteprinter')->middleware('auth');
Route::get('/printer/upload', [printer::class, 'upload'])->name('upload')->middleware('auth');
Route::post('/printer/uploadproses', [printer::class, 'uploadproses'])->name('uploadproses')->middleware('auth');

Route::get('/login', [login::class, 'login'])->name('login');
Route::post('actionlogin', [login::class, 'actionlogin'])->name('actionlogin');
Route::get('dashboard', [Dashboard::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('actionlogout', [login::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
Route::get('register', [register::class, 'register'])->name('register');
Route::post('register/action', [register::class, 'actionregister'])->name('actionregister');