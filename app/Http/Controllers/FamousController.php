<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Rating;
use App\Models\Author;

class FamousController extends Controller
{
    public function topAuthors()
    {
        $topAuthors = Author::select('authors.*', DB::raw('SUM(ratings.rating) as total_rating'))
            ->join('books', 'authors.id', '=', 'books.author_id')
            ->join('ratings', 'books.id', '=', 'ratings.book_id')
            ->groupBy('authors.id','authors.author_name')
            ->orderByDesc('total_rating')
            ->limit(10)
            ->get();

        return view('famous', ['topAuthors' => $topAuthors]);
    }

}
