@extends('layouts.app')

@section('content')

    <!-- Bootstrapの定形コード… -->
    <div class="panel-body">
        <!-- バリデーションエラーの表示 -->
        @include('common.errors')
        <!-- バリデーションエラーの表示 -->

        <!-- 本登録フォーム -->
        <form enctype="multipart/form-data" action="{{ url('books') }}" method="POST" class="form-horizontal">
            
            {{ csrf_field() }}

            <!-- 本のタイトル -->
            <div class="form-group">
                
                <div class="col-sm-6">
                    <label for="book" class="col-sm-3 control-label">イベント名</label>
                    <input type="text" name="item_name" id="book-name" class="form-control">
                </div>
                
                <div class="col-sm-6">
                    <label for="amount" class="col-sm-3 control-label">参加費</label>
                    <input type="text" name="item_amount" id="book-amount" class="form-control">
                </div>
                
                <div class="col-sm-6">
                    <label for="number" class="col-sm-3 control-label">参加人数</label>
                    <input type="text" name="item_number" id="book-number" class="form-control">
                </div>
                
                  <div class="col-sm-6">
                    <label for="published" class="col-sm-3 control-label">開催日</label>
                    <input type="date" name="published" id="book-published" class="form-control">
                </div>  
                   <div class="col-sm-6">
                       <label for="image" class="col-sm-3 control-label">画像</label>
                        <input type="file" id="image" name="image" class="form-control" value=""/>
                </div>
                <div class="col-sm-6">
                       <label for="description" class="col-sm-3 control-label">詳細</label>
                        <input type="text" id="description" name="description" class="form-control" value=""/>
                </div>
                <div class="col-sm-6">
                       <label for="location" class="col-sm-3 control-label">場所</label>
                        <input type="text" id="location" name="location" class="form-control" value=""/>
                </div>
                
            </div>

            <!-- 本 登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="glyphicon glyphicon-plus" aria-hidden="true"></i> Save
                    </button>
                </div>
            </div>
        </form>



    <!-- 現在の本 -->
    @if (count($books) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                開催間近
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>イベント一覧</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- テーブル本体 -->
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                
                                <!-- 本タイトル -->
                                <td class="table-text">
                                    <div>{{ $book->item_name }}</div>
                                    <div>{{ $book->item_number }}名</div>
                                    <div>{{ $book->item_amount }}円</div>
                                    <div>{{ $book->published }}</div>
                                    <div>{{ $book->description }}</div>
                                    <div>{{ $book->location }}</div>
                                    
                                       <img src="../storage/upload/{{$book->image}}" width="400" height="250" alt="">

                                </td>
                                
                                <!-- 本: 更新ボタン -->
                                <td>
                                    <form action="{{ url('booksedit/'.$book->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary">
                                            <i class="glyphicon glyphicon-pencil"></i> 更新
                                        </button>
                                    </form>
                                </td>
                                
                                <!-- 本: 削除ボタン -->
                                <td>
                                    <form action="{{ url('book/delete/'.$book->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger">
                                            <i class="glyphicon glyphicon-trash"></i> 削除
                                        </button>
                                    </form>
                                </td>
                                

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
    <div class="col-md-4 offset-md-4">
       {{ $books->links()}}
     </div>
</div>
        </div>
    @endif
    <!-- Book: 既に登録されてる本のリスト -->
    
        </div>
    <!-- 本登録フォームの作成 -->

@endsection
