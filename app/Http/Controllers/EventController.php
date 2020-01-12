<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Validator;
use Auth;
use Session;
class EventController extends Controller
{
    //
    public function showEvent($event_id){
    $eventData = Book::find($event_id);
    return view('event', compact("eventData"));  //'books' => $books;省略できる
    }


// 登録
   
      public function join(Request $request){
    //       $eventData = Book::find($event_id);
    // return view('mypage', compact("eventData"));
        //バリデーション
    // $validator = Validator::make($request->all(), [
    //         'item_name' => 'required|min:3|max:255',
    //         'item_number' => 'required | min:1 | max:500',
    //         'item_amount' => 'required | max:8',
    //          'published'   => 'required',
    //          'description' => 'required|min:3|max:500',
    //          'location' => 'required|min:3|max:255',
    //          'image'   => 'required',
    // ]);
    // //バリデーション:エラー
    // if ($validator->fails()) {
    //         return redirect('/')
    //             ->withInput()
    //             ->withErrors($validator);
    // }
    // // Eloquent モデル
    // $books = new Book;
    // $books->item_name =    $request->item_name;
    // $books->item_number =  $request->item_number;
    // $books->item_amount =  $request->item_amount;
    // $books->published =    $request->published;
    // $books->description =    $request->description;
    // $books->location =    $request->location;
    // $books->image =    $request->image;
    
    
    // $file = $request->file('image');
    // if( !empty($file) ){
    //     $filename = $file->getClientOriginalName();
    //     $move = $file->storeAs('public/upload',$filename);
    // }else{
    //     $filename = "";
    // }
    // $books->image=$filename;
    // $books->join();   //「/」ルートにリダイレクト 
    // return redirect('/');
    
        if (Auth::check()){
            $eventData = Book::find($event_id);
            
        }else{
            session()->put("redirect_url", "");
            return redirect('/login');
        }
    }
    
}