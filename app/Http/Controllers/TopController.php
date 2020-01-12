<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Validator;
use Auth;
class TopController extends Controller
{
    public function top(){
             $books = Book::orderBy('created_at', 'asc')->paginate(7);
            return view('top', [
                'books' => $books
                 ]);
    }
}
