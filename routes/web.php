<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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
    return view('welcome');
});


Route::get('/buku', [BookController::class, 'index'])->name('buku');
Route::get('/addbuku', [BookController::class, 'addbuku'])->name('addbuku');
Route::post('/insertdata', [BookController::class, 'insertdata'])->name('insertdata');
