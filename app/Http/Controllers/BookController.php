<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Rating;

class BookController extends Controller
{
    public function index(Request $request){
        $perPage = $request->input('pagination', 10);
        $search = $request->input('search');

        $books = Book::with(['category', 'author'])
            ->when($search, function ($query, $search) {
                return $query->where('book_name','like', '%' . $search . '%');
            })
            ->orderByDesc(DB::raw('(SELECT AVG(rating) FROM ratings WHERE book_id = books.id)'))
            ->paginate($perPage);

        return view('book', ['books' => $books]);
    }


}
