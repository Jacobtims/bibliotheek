<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', \App\Http\Controllers\HomeController::class)->name('home');
Route::get('/genres', \App\Http\Controllers\HomeController::class)->name('genres');
Route::get('/auteurs', \App\Http\Controllers\HomeController::class)->name('auteurs');

Route::get('/books', [\App\Http\Controllers\BookController::class, 'index'])->name('books.index');
Route::get('/books/{book}', [\App\Http\Controllers\BookController::class, 'show'])->name('books.show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::middleware('role:Lezer')->group(function () {
        Route::post('/books/reserve/{book}', [\App\Http\Controllers\BookController::class, 'reserve'])->name('books.reserve');
        Route::post('/books/cancel-reservation/{book}', [\App\Http\Controllers\BookController::class, 'cancelReservation'])->name('books.cancel-reservation');
        Route::get('/books/lent-out', [\App\Http\Controllers\BookController::class, 'reserved'])->name('books.reserved');
    });

    Route::get('/dashboard', \App\Http\Controllers\Dashboard\DashboardController::class)->name('dashboard');

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::middleware('role:Admin')->group(function () {
            Route::resource('employees', \App\Http\Controllers\Dashboard\EmployeeController::class)->parameters(['employees' => 'user'])->except('show');
            Route::resource('books', \App\Http\Controllers\Dashboard\BookController::class)->except('show');
        });
    });
});

require __DIR__.'/auth.php';
