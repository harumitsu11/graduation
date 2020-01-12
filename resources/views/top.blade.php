<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
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
                                    
                                       <img src="./storage/upload/{{$book->image}}" width="400" height="250" alt="">

                                </td>
                            </tr>
                            
                        @endforeach
                        <div class="row">
                                <div class="col-md-4 offset-md-4">
                                   {{ $books->links()}}
                                 </div>
                              </div>
    
</body>
</html>