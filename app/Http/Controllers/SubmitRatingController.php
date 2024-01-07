<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Rating;

class SubmitRatingController extends Controller
{
    public function submitRatingForm()
    {
        $authors = Author::all();
        $books = Book::all();

        return view('rating_form', compact('authors', 'books'));
    }

    public function submitRating(Request $request)
    {
        $request->validate([
            'author_id' => 'required|exists:authors,id',
            'book_id' => 'required|exists:books,id',
            'rating' => 'required|numeric|min:1|max:10',
        ]);

        Rating::create([
            'book_id' => $request->input('book_id'),
            'rating' => $request->input('rating'),
        ]);


        return redirect('/')->with('message','Thank You For The Rating');
    
    }
}
