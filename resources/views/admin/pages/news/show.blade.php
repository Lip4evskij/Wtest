@extends('admin.admin-index')
@section('title', 'Просмотр поста')
@section('content')
    <h1>{{$news->title}}</h1>
    <div class="show_add_content">

        @if(isset($news->image) && $news->image)
           <div class="col-md-4">
               <img src="{{asset($news->image)}}" class="admin-img" alt="">
           </div>
            @else
            <div class="col-md-4">
                <img src="{{asset('img/no-image.png')}}" class="admin-img" alt="">
            </div>
        @endif
        <div class="col-md-8">
            <p>{{$news->content}}</p>
        </div>
    </div>
    <div class="col-md-9 cntrl_btn">
        <a href="{{URL::to('admin-panel/'.$news->id).'/edit'}}" class="btn btn-default cntrl_btn">Редактировать</a>
        {{ Form::open(['method' => 'DELETE', 'route' => ['admin-panel.destroy', $news->id]]) }}
        {{ Form::submit('Удалить', ['class' => 'btn btn-danger delete_btn']) }}
        {{ Form::close() }}

    </div>
@endsection