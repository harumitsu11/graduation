<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <title>トップページ</title>
   
</head>
<body>
    <thead>
                <div class=text-center>
                    <div class="text-primary">
                        <h3>
                            <th>イベント一覧</th>
                            <th>&nbsp;</th>
                        </h3>
                    </div>
                    
                </div>
                    </thead>

                    <!-- テーブル本体 -->
                    <tbody>
                        <div class="row">
                              @foreach ($books as $book)
                            
                              <div class="col-sm-4">
                                <tr>
                                    
                                    <!-- 本タイトル -->
                                    <td class="table-text">
                                        <div>{{ $book->item_name }}</div>
                                        <div>{{ $book->item_number }}名</div>
                                        <div>{{ $book->item_amount }}円</div>
                                        <div>{{ $book->published }}</div>
                                        <div>{{ $book->description }}</div>
                                        <div>{{ $book->location }}</div>
                                           
                                                <a href="{{ url('/event/'.$book->id) }}"> 
                                                    {{($book->id)}}
                                                    <img src="../storage/upload/{{$book->image}}" width="400" height="250" alt="">
                                    
                                                </a>
                                            
    
                                    </td>
                                </tr>
                                </div>
                                
                            @endforeach
                            </div>
                           
                            
                                <div class="row">
                                    <div class="col-md-4 offset-md-4">
                                       {{ $books->links()}}
                                     </div>
                              
                        </div>
                        
    
</body>
</html>