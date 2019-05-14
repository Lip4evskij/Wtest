@extends('admin.admin-index')
@section('title', 'Все новости')
@section('content')

    @if(isset($news) && $news)
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Описание</th>
            <th scope="col">Статус</th>
            <th style="width: 20%" scope="col">Изображение</th>
            <th scope="col">Контент</th>
            <th scope="col">Управление</th>
        </tr>
        </thead>
        <tbody>

        @foreach($news as $new)
            <tr>
                <th scope="row">{{$new->id}}</th>
                <td>{{$new->title}}</td>
                {{--<td>{{$key->active}}</td>--}}
                <td>
                    @if($new->active==1)
                        <i style="font-size:24px; color: forestgreen " class="fa ">&#xf0c8;</i>
                    @else
                        <i style="font-size:24px" class="fa">&#xf096;</i>
                    @endif

                </td>

                <td>
                    @if(isset($new->image) && $new->image != null)
                            <img src="{{asset($new->image)}}" class="admin_index_img" alt="">
                    @else
                            <img src="{{asset('img/no-image.png')}}" class="admin_index_img" alt="">
                    @endif
                </td>
                <td>{{$new->content}}</td>
                <td>
                    <a href="{{URL::to('admin-panel/'. $new->id).'/edit'}}"
                       class="btn btn-default" style="float: left; margin-right:15px " >Редактировать</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['admin-panel.destroy', $new->id]]) !!}
                    {!! Form::submit('Удалить',['class'=> 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {{$news->Links()}}
        @else
        <h2>Нету новостей</h2>
    @endif
@endsection