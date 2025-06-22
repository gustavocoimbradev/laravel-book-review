<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('books.index');
});

Route::resource('books', BookController::class);
Route::resource('reviews', ReviewController::class);