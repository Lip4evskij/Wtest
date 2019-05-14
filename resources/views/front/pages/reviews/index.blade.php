@extends('front-index')
@section('title', 'Все отзывы')
@section('content')
    <a href="/reviews/create" class="btn btn-default">Добавить отзыв</a>
     @if(isset($reviews) && $reviews != null)
             <div class="row">
        @foreach($reviews as $review)

           <h2>{{$review->name}}</h2>
            <p>{{$review->text}}</p>
             <p>Дата: {{$review->created_at}}</p>
                     <hr>
        @endforeach

    </div>
    {{$reviews->Links()}}
         @else
         <h2>Нету отзывов</h2>
    @endif
@endsection