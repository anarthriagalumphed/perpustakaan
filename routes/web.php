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
    Route::get('register', [RegisterController::class, 'register']);
    Route::post('register', [RegisterController::class, 'registerProcess']);
});


Route::middleware('auth')->group(function () {
    Route::get('logout', [LogoutController::class, 'logout']);
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->middleware('only_admin');
    Route::get('profile', [ProfileController::class, 'profile']);
    Route::get('books', [BookController::class, 'books']);


    Route::get('add_books', [BookController::class, 'add_books'])->middleware('only_admin');
    Route::post('add_books', [BookController::class, 'store'])->middleware('only_admin');
    Route::get('edit_books/{slug}', [BookController::class, 'edit_books'])->middleware('only_admin');
    Route::post('edit_books/{slug}', [BookController::class, 'update_books'])->middleware('only_admin');
    Route::get('delete_books/{slug}', [BookController::class, 'delete_books'])->middleware('only_admin');
    Route::get('destroy_books/{slug}', [BookController::class, 'destroy_books'])->middleware('only_admin');
    Route::get('deleted_books', [BookController::class, 'deleted_books'])->middleware('only_admin');
    Route::get('restore_books/{slug}', [BookController::class, 'restore_books'])->middleware('only_admin');


    Route::get('categories', [CategoriesController::class, 'categories'])->middleware('only_admin');


    Route::post('add_category', [CategoriesController::class, 'store'])->middleware('only_admin');
    Route::get('add_category', [CategoriesController::class, 'add_category'])->middleware('only_admin');
    Route::get('edit_category/{slug}', [CategoriesController::class, 'edit_category'])->middleware('only_admin');
    Route::put('edit_category/{slug}', [CategoriesController::class, 'update_category'])->middleware('only_admin');
    Route::get('delete_category/{slug}', [CategoriesController::class, 'delete_category'])->middleware('only_admin');
    Route::get('destroy_category/{slug}', [CategoriesController::class, 'destroy_category'])->middleware('only_admin');
    Route::get('deleted_category', [CategoriesController::class, 'deleted_category'])->middleware('only_admin');
    Route::get('restore_category/{slug}', [CategoriesController::class, 'restore_category'])->middleware('only_admin');


    Route::get('users', [UsersController::class, 'users'])->middleware('only_admin');
    Route::get('registered_users', [UsersController::class, 'registered_users'])->middleware('only_admin');
    Route::get('detail_users/{slug}', [UsersController::class, 'detail_users'])->middleware('only_admin');
    Route::get('approve_users/{slug}', [UsersController::class, 'approve_users'])->middleware('only_admin');
    Route::get('delete_users/{slug}', [UsersController::class, 'delete_users'])->middleware('only_admin');
    Route::get('destroy_users/{slug}', [UsersController::class, 'destroy_users'])->middleware('only_admin');
    Route::get('deleted_users', [UsersController::class, 'deleted_users'])->middleware('only_admin');
    Route::get('restore_users/{slug}', [UsersController::class, 'restore_users'])->middleware('only_admin');

    
    Route::get('rent_logs', [Rent_LogsController::class, 'rent_logs'])->middleware('only_admin');
});



// route dibawah ini dijalankan jika ingin admin tidak dapat mengakses profile
// Route::get('profile', [UserController::class, 'profile'])->middleware(['auth', 'only_client']);
