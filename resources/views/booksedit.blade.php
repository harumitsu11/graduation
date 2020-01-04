@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
    @include('common.errors')
    <form action="{{ url('books/update') }}" method="POST">

        <!-- item_name -->
        <div class="form-group">
           <label for="item_name">イベント名</label>
           <input type="text" id="item_name" name="item_name" class="form-control" value="{{$book->item_name}}">
        </div>
        <!--/ item_name -->
        
        <!-- item_number -->
        <div class="form-group">
           <label for="item_number">参加人数</label>
        <input type="text" id="item_number" name="item_number" class="form-control" value="{{$book->item_number}}">
        </div>
        <!--/ item_number -->

        <!-- item_amount -->
        <div class="form-group">
           <label for="item_amount">参加費</label>
        <input type="text" id="item_amount" name="item_amount" class="form-control" value="{{$book->item_amount}}">
        </div>
        <!--/ item_amount -->
        
        
        <!-- published -->
        <div class="form-group">
           <label for="published">開催日</label>
            <input type="datetime" id="published" name="published" class="form-control" value="{{$book->published}}"/>
        </div>
        
        <div class="form-group">
           <label for="image">画像</label>
            <input type="file" id="image" name="image" class="form-control" value="{{$book->image}}"/>
        </div>
        
        <div class="form-group">
           <label for="description">詳細</label>
            <input type="text" id="description" name="description" class="form-control" value="{{$book->description}}"/>
        </div>
      
        <div class="form-group">
           <label for="location">場所</label>
            <input type="text" id="location" name="location" class="form-control" value="{{$book->locations}}"/>
        </div>
        
        <!-- Saveボタン/Backボタン -->
        <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link pull-right" href="{{ url('/') }}">
                <i class="glyphicon glyphicon-backward"></i>  Back
            </a>
        </div>
        <!--/ Saveボタン/Backボタン -->
         
         <!-- id値を送信 -->
         <input type="hidden" name="id" value="{{$book->id}}" />
         <!--/ id値を送信 -->
         
         <!-- CSRF -->
         {{ csrf_field() }}
         <!--/ CSRF -->
         
    </form>
    </div>
</div>
@endsection