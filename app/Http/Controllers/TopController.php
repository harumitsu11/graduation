<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Validator;
use Auth;
class TopController extends Controller
{
    public function top()
    {
        return view('top');
    }
}
