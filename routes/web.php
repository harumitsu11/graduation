<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Book;
use Illuminate\Http\Request; 

Auth::routes();
Route::get('/top','TopController@top')->name('top'); // >name('top')はなくてもいい
Route::get('/event/{event_id}/', 'EventController@showEvent');
Route::POST('/event/apply/', 'EventController@join');
// Route::get('/mypage/{event_id}/', 'MypageController@join');



// Route::get('/event','TopController@event')->name('event');

/**
* 本のダッシュボード表示 */
Route::get('/', 'BooksController@index');

/**
* 新「本」を追加 */
Route::post('/books', 'BooksController@store');

//更新画面
Route::post('/booksedit/{books}','BooksController@edit');

//更新処理
Route::post('/books/update', 'BooksController@update');

/**
* 本を削除 */
Route::post('/book/delete/{book}', 'BooksController@destroy');


//12/29 rewrote

Route::group(['prefix' => 'admin', 'middleware' => 'guest:admin'], function() {
    Route::get('/home', function () {
        return view('admin.home');
    });
    Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\Auth\LoginController@login')->name('admin.login');
    Route::get('register', 'Admin\Auth\RegisterController@showRegisterForm')->name('admin.register');
    Route::post('register', 'Admin\Auth\RegisterController@register')->name('admin.register');
});
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function(){
    Route::post('logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
    Route::get('home', 'Admin\HomeController@index')->name('admin.home');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
