@extends('front-index')
@section('title', $new->title)
@section('content')

    <h1>{{$new->title}}</h1>
    <div class="show_add_content">
        @if(isset($new->image) && $new->image)
            <div class="col-md-4">
                <img src="{{asset($new->image)}}" class="front-img" alt="">
            </div>
        @else
            <div class="col-md-4">
                <img src="{{asset('img/no-image.png')}}" class="front-img" alt="">
            </div>
        @endif
        <div class="col-md-8">
            <p>{{$new->content}}</p>
            <p>Дата: {{$new->created_at}}</p>
            <p>Кол-во просмотров: {{$all_views}}</p>
        </div>
    </div>
@endsection