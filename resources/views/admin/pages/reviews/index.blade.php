@extends('admin.admin-index')
@section('title', 'Все отзывы')
@section('content')
    @if(isset($reviews) && $reviews)
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ФИО</th>
                <th scope="col">Статус</th>
                <th scope="col">Контент</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>

            @foreach($reviews as $review)
                <tr>
                    <th scope="row">{{$review->id}}</th>
                    <td>{{$review->name}}</td>
                    {{--<td>{{$key->active}}</td>--}}
                    <td>
                        @if($review->status==1)
                            <i style="font-size:24px; color: forestgreen " class="fa ">&#xf0c8;</i>
                        @else
                            <i style="font-size:24px" class="fa">&#xf096;</i>
                        @endif

                    </td>


                    <td>{{$review->text}}</td>
                    <td>
                        <a href="{{URL::to('reviews/'. $review->id).'/edit'}}"
                           class="btn btn-default" style="float: left; margin-right:15px " >Редактировать</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['reviews.destroy', $review->id]]) !!}
                        {!! Form::submit('Удалить',['class'=> 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        {{$reviews->Links()}}
    @else
        <h2>Нету отзывов</h2>
    @endif

@endsection