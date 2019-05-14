@extends('front-index')
@section('title', 'Все новости')
@section('content')
    {{ Form::open(array('route' => 'sort', 'method' => 'get')) }}

    <div class="form-group first_element">
        <div class="col-md-6 lp_select">
            {{Form::select('request', array(
            'DataDESC' => 'Дата по убыванию',
            'DataASC' => 'Дата по возрастанию ',
            'RatingDESC' => 'Рейтинг по убыванию',
            'RatingASC' => 'Рейтинг по возрастанию',
            ), 'DataDESC')}}
            {{Form::submit('Применить',['class'=>'btn btn-primary filter_btn'])}}
        </div>
    </div>

    {{ Form::close() }}

    <div class="row st_news">
    @foreach($news as $new)

            <div class="col-1-3">
                <div class="wrap-col">
                    <article>
                        <div class="post-thumbnail-wrap">
                            <a href="{{route('newShow',['title'=>$new->slug])}}" class="portfolio-box">
                                @if(isset($new->image) && $new->image)
                                        <img src="{{asset($new->image)}}" class="admin-img" alt="">
                                @else
                                        <img src="{{asset('img/no-image.png')}}" class="admin-img" alt="">
                                @endif
                                <div class="portfolio-box-second">
                                    <img src="images/1.jpg" alt="">
                                </div>
                            </a>
                        </div>
                        <div class="entry-header ">
                            <a href="{{route('newShow',['title'=>$new->slug])}}" class="portfolio-box">
                            <h3 class="entry-title">{{$new->title}}</h3>
                            </a>
                            <p>{{mb_strimwidth($new->content,0,30,"...")}}</p>
                        </div>
                    </article>
                </div>
            </div>

    @endforeach

    </div>
    {{$news->Links()}}
@endsection