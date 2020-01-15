<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{$eventData->item_name}}
    {{$eventData->item_number}}
    {{$eventData->item_amount}}
    {{$eventData->published}}
    {{$eventData->location}}
    {{$eventData->description}}
    {{$eventData->image}}
    <img src="../storage/upload/{{$eventData->image}}" width="400" height="250" alt="">　


   
        <div class="well well-sm">
            
            <form action="{{ url('event/apply') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="item_name" value="{{$eventData->id}}">
                <button type="submit" class="btn btn-primary">参加する</button>
                
            </form>
            
            <a class="btn btn-link pull-right" href="{{ url('/') }}">
                <i class="glyphicon glyphicon-backward"></i>  Back
            </a>
        </div>
       
    
</body>
</html>