<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Validator;
use Auth;

class BooksController extends Controller
{
        // 本ダッシュボード表示
        public function index(){
             $books = Book::orderBy('created_at', 'dsc')->paginate(5);
            return view('books', [
                'books' => $books
    ]);
        }
        public function edit(Book $books){
            //{books}id 値を取得 => Book $books id 値の1レコード取得
            return view('booksedit', ['book' => $books]);
        }
        
    // 登録
    public function store(Request $request){
        //バリデーション
    $validator = Validator::make($request->all(), [
            'item_name' => 'required|min:3|max:255',
            'item_number' => 'required | min:1 | max:500',
            'item_amount' => 'required | max:8',
             'published'   => 'required',
             'description' => 'required|min:3|max:500',
             'location' => 'required|min:3|max:255',
             'image'   => 'required',
    ]);
    //バリデーション:エラー
    if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
    }
    // Eloquent モデル
    $books = new Book;
    $books->item_name =    $request->item_name;
    $books->item_number =  $request->item_number;
    $books->item_amount =  $request->item_amount;
    $books->published =    $request->published;
    $books->description =    $request->description;
    $books->location =    $request->location;
    $books->image =    $request->image;
    
    
    $file = $request->file('image');
    if( !empty($file) ){
        $filename = $file->getClientOriginalName();
        $move = $file->storeAs('public/upload',$filename);
    }else{
        $filename = "";
    }
    $books->image=$filename;
    $books->save();   //「/」ルートにリダイレクト 
    return redirect('/');
    
    
    }
    
    //更新処理
    public function update(Request $request){
        //バリデーション　更新
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'item_name' => 'required|min:3|max:255',
            'item_number' => 'required|min:1|max:500',
            'item_amount' => 'required|max:8',
            'published' => 'required',
            'description' => 'required|min:3|max:500',
             'location' => 'required|min:1|max:255',
             'image'   => 'required',
            
    ]);
    //バリテ���ーション:エラー
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
    }
    //データ更新
    $books = Book::find($request->id);
    $books->item_name   = $request->item_name;
    $books->item_number = $request->item_number;
    $books->item_amount = $request->item_amount;
    $books->published   = $request->published;
    $books->description =    $request->description;
    $books->location =    $request->location;
    $books->image =    $request->image;
    $books->save();
    return redirect('/');
    }
    
    // 削除処理
    public function destroy(Book $book){
        $book->delete();
        return redirect('/');
        
    }
    
        
    
}
