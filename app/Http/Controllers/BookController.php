<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index(Request $request)
    {
        $title = $request->input('title');
        $filter = $request->input('filter', '');

        $books = Book::withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->when($title, function ($query, $title) {
                return $query->title($title);
            });

        $books = match($filter) {
            'popular_last_month' => $books->popularLastMonth(),
            'popular_last_6months' => $books->popularLast6Months(),
            'highest_rated_last_month' => $books->highestRatedLastMonth(),
            'highest_rated_last_6months' => $books->highestRatedLast6Months(),
            default => $books->latest()
        };

        $cacheKey = "books:$filter:$title";
        
        $books = cache()->remember($cacheKey, 3600, fn() => $books->get()); 

        return view('books.index', compact('books'));
    }

    public function show(Book $book) {
        $cacheKey = "book:$book->id";

        $book = cache()->remember($cacheKey, 3600, function () use ($book) {
            return $book->loadAvg('reviews', 'rating')
                        ->loadCount('reviews');
        });

        return view('books.show', compact('book'));
    }
    
}
