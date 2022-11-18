<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', HomeController::class)->name('home');
Route::get('/genres', HomeController::class)->name('genres');
Route::get('/auteurs', HomeController::class)->name('auteurs');

Route::get('/books', [\App\Http\Controllers\BookController::class, 'index'])->name('books.index');
Route::get('/books/{book}', [\App\Http\Controllers\BookController::class, 'index'])->name('books.show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', \App\Http\Controllers\Dashboard\DashboardController::class)->name('dashboard');

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::middleware('role:Admin')->group(function () {
            Route::resource('employees', \App\Http\Controllers\Dashboard\EmployeeController::class)->parameters(['employees' => 'user'])->except('show');
            Route::resource('books', \App\Http\Controllers\Dashboard\BookController::class)->except('show');
        });
    });
});

require __DIR__.'/auth.php';
