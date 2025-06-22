<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    
    public function store(Request $request) {

        $data = $request->validate([
            'rating' => 'required|integer|between:1,5',
            'review' => 'required|string',
            'book_id' => 'required|integer'
        ]);

        $review = Review::create($data);

        if ($review) {
            return redirect()->route('books.show', ['book' => $request->book_id])->with('success', 'Your review has been submitted successfully!');
        } else {
            return redirect()->route('books.show', ['book' => $request->book_id])->with('error', 'Failed to submit your review.');
        }

    }

}
