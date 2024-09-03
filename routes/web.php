<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::get('/admin', [HomeController::class, 'index'])->name('home');
    Route::resource('admin/categories', CategoryController::class);
    Route::resource('admin/books', BookController::class);
    Route::resource('admin/users', UserController::class);
    Route::get('/admin/borrow', [TransactionController::class, 'borrow'])->name('borrow.index');
    Route::get('/admin/return', [TransactionController::class, 'return'])->name('return.index');
    Route::get('/admin/return/detail/{id}', [TransactionController::class, 'detail'])->name('return.detail');

    Route::get('/book/{id}', [TransactionController::class, 'addBooktoCart'])->name('addbook.to.cart');
    Route::get('/delete-book/{id}', [TransactionController::class, 'deleteBookFromCart'])->name('deleteBook.from.cart');
    Route::get('/delete-all-books', [TransactionController::class, 'deleteAllBookFromCart'])->name('deleteAllBooks.from.cart');
    Route::post('/select-user', [TransactionController::class, 'selectUser'])->name('select.user');
    Route::get('/borrow-books', [TransactionController::class, 'borrowBooks'])->name('borrow.books');


});
