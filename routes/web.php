<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PublicController;
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

Route::get('/', [PublicController::class, 'index'])->name('book_list');


Route::middleware('only_guest')->group(function () {

    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticating']);
    Route::get('register', [RegisterController::class, 'register']);
    Route::post('register', [RegisterController::class, 'registerProcess']);
});


Route::middleware('auth')->group(function () {
    Route::get('logout', [LogoutController::class, 'logout']);
    Route::get('profile', [ProfileController::class, 'profile']);
});

Route::middleware('only_admin')->group(function () {

    Route::get('dashboard', [DashboardController::class, 'dashboard']);

    Route::get('books', [BookController::class, 'books']);

    Route::get('add_books', [BookController::class, 'add_books']);
    Route::post('add_books', [BookController::class, 'store']);
    Route::get('edit_books/{slug}', [BookController::class, 'edit_books']);
    Route::post('edit_books/{slug}', [BookController::class, 'update_books']);
    Route::get('delete_books/{slug}', [BookController::class, 'delete_books']);
    Route::get('destroy_books/{slug}', [BookController::class, 'destroy_books']);
    Route::get('deleted_books', [BookController::class, 'deleted_books']);
    Route::get('restore_books/{slug}', [BookController::class, 'restore_books']);


    Route::get('categories', [CategoriesController::class, 'categories']);

    Route::post('add_category', [CategoriesController::class, 'store']);
    Route::get('add_category', [CategoriesController::class, 'add_category']);
    Route::get('edit_category/{slug}', [CategoriesController::class, 'edit_category']);
    Route::put('edit_category/{slug}', [CategoriesController::class, 'update_category']);
    Route::get('delete_category/{slug}', [CategoriesController::class, 'delete_category']);
    Route::get('destroy_category/{slug}', [CategoriesController::class, 'destroy_category']);
    Route::get('deleted_category', [CategoriesController::class, 'deleted_category']);
    Route::get('restore_category/{slug}', [CategoriesController::class, 'restore_category']);


    Route::get('users', [UsersController::class, 'users']);

    Route::get('registered_users', [UsersController::class, 'registered_users']);
    Route::get('detail_users/{slug}', [UsersController::class, 'detail_users']);
    Route::get('approve_users/{slug}', [UsersController::class, 'approve_users']);
    Route::get('delete_users/{slug}', [UsersController::class, 'delete_users']);
    Route::get('destroy_users/{slug}', [UsersController::class, 'destroy_users']);
    Route::get('deleted_users', [UsersController::class, 'deleted_users']);
    Route::get('restore_users/{slug}', [UsersController::class, 'restore_users']);



    Route::get('rent_logs', [Rent_LogsController::class, 'rent_logs']);
});

// route dibawah ini dijalankan jika ingin admin tidak dapat mengakses profile
// Route::get('profile', [UserController::class, 'profile'])->middleware(['auth', 'only_client']);
