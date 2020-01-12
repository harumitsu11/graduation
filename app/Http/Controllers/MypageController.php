<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
class MypageController extends Controller
{
    //
    public function join($event_id){
    $eventData = Book::find($event_id);
    return view('mypage', compact("eventData"));  //'books' => $books;省略できる
    }
}
