<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\ProtectedRoute;
use App\Http\Middleware\PublicRoute;
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

Route::middleware([PublicRoute::class])->group(function () {

    Route::get('/', [HomeController::class, 'login'])->name('home.login');

    Route::prefix('auth')->group(function () {

        Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

    });

});

Route::middleware([ProtectedRoute::class])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('authors')->group(function () {

        Route::prefix('{authorId}')->group(function () {

            Route::get('/', [AuthorController::class, 'getAuthor'])->name('authors.view');

            Route::post('/delete', [AuthorController::class, 'delete'])->name('authors.delete');

        });

    });

    Route::prefix('books')->group(function () {

        Route::get('/create', [BookController::class, 'create'])->name('books.create');
        Route::post('/', [BookController::class, 'store'])->name('books.store');

        Route::prefix('{bookId}')->group(function () {

            Route::post('/delete', [BookController::class, 'delete'])->name('books.delete');

        });
    });

    Route::prefix('users')->group(function () {

        Route::prefix('{userId}')->group(function () {

            Route::get('/profile', [UserController::class, 'profile'])->name('users.profile');

        });

    });

    Route::prefix('auth')->group(function () {
        Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    });

});
