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

Route::get('/books', [\App\Http\Controllers\BookController::class, 'index'])->name('books.index');
Route::get('/books/{book}', [\App\Http\Controllers\BookController::class, 'show'])->name('books.show');

Route::get('/subscriptions', [\App\Http\Controllers\SubscriptionController::class, 'show'])->name('subscriptions.show');
Route::post('/subscription/purchase/{subscriptionPlan}', [\App\Http\Controllers\SubscriptionController::class, 'purchase'])->name('subscriptions.purchase');

Route::middleware(['auth', 'verified', 'subscription'])->group(function () {
    Route::middleware('role:Lezer')->group(function () {
        Route::post('/books/reserve/{book}', [\App\Http\Controllers\BookController::class, 'reserve'])->name('books.reserve');
        Route::post('/books/cancel-reservation/{book}', [\App\Http\Controllers\BookController::class, 'cancelReservation'])->name('books.cancel-reservation');
        Route::get('/dashboard/books/lent-out', [\App\Http\Controllers\BookController::class, 'lentOut'])->name('dashboard.books.lent-out');
        Route::post('/dashboard/books/extend/{book}', [\App\Http\Controllers\BookController::class, 'extend'])->name('dashboard.books.extend');
    });

    Route::get('/dashboard', \App\Http\Controllers\Dashboard\DashboardController::class)->name('dashboard');

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::middleware('role:Personeel')->group(function () {
            Route::get('/lend-out', [\App\Http\Controllers\Dashboard\BookController::class, 'lendOut'])->name('lend-out');
            Route::post('/lend-out', [\App\Http\Controllers\Dashboard\BookController::class, 'lendOutBook'])->name('lend-out-book');
            Route::get('/extend', [\App\Http\Controllers\Dashboard\BookController::class, 'extend'])->name('extend');
            Route::post('/extend', [\App\Http\Controllers\Dashboard\BookController::class, 'extendBook'])->name('extend-book');
            Route::get('/return', [\App\Http\Controllers\Dashboard\BookController::class, 'return'])->name('return');
            Route::post('/return', [\App\Http\Controllers\Dashboard\BookController::class, 'returnBook'])->name('return-book');
            Route::resource('readers', \App\Http\Controllers\Dashboard\ReaderController::class)->parameters(['readers' => 'user']);
        });
        Route::middleware('role:Admin')->group(function () {
            Route::resource('employees', \App\Http\Controllers\Dashboard\EmployeeController::class)->parameters(['employees' => 'user'])->except('show');
            Route::resource('books', \App\Http\Controllers\Dashboard\BookController::class)->except('show');
            Route::resource('notifications', \App\Http\Controllers\Dashboard\NotificationController::class)->except('show');
        });
    });
});

require __DIR__.'/auth.php';
