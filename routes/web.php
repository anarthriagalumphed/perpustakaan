<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Rent_LogsController;
use App\Http\Controllers\CategoriesController;

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
})->middleware('auth');


Route::middleware('only_guest')->group(function () {
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticating']);
    // Route::post('login', [LoginController::class, 'loginProcess']);
    // Route::post('login', [LoginController::class, 'username']);
    // Route::post('login', [LoginController::class, 'loginProcess'])->name('loginProcess');
    Route::get('register', [RegisterController::class, 'register']);
    Route::post('register', [RegisterController::class, 'registerProcess']);
});


Route::middleware('auth')->group(function () {
    Route::get('logout', [LogoutController::class, 'logout']);
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->middleware('only_admin');
    Route::get('profile', [ProfileController::class, 'profile']);
    Route::get('books', [BookController::class, 'books']);
    Route::get('categories', [CategoriesController::class, 'categories'])->middleware('only_admin');
    Route::get('users', [UsersController::class, 'users'])->middleware('only_admin');
    Route::get('rent_logs', [Rent_LogsController::class, 'rent_logs'])->middleware('only_admin');
});



// route dibawah ini dijalankan jika ingin admin tidak dapat mengakses profile
// Route::get('profile', [UserController::class, 'profile'])->middleware(['auth', 'only_client']);
