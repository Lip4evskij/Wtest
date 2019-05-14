@extends('admin.admin-index')
@section('title', 'Редактирование')
@section('content')
    <div class="col-md-9">
        {!! Form::model($review, array('route' => array('reviews.update', $review->id),'method'=>'PUT')) !!}

        <div class="form-group first_element">
            <div class="col-md-3">
                {{Form::label('name','ФИО')}}
            </div>
            <div class="col-md-9">
                {{Form::text('name',null,['class' => 'form-control'])}}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {{Form::label('email','Email')}}
            </div>
            <div class="col-md-9">
                {{Form::email('email', null, ['class' => 'form-control'])}}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {{Form::label('text','Текст отзывы')}}
            </div>
            <div class="col-md-9">
                {{Form::textarea('text',null,['class' => 'form-control'])}}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {{Form::label('active','Статус')}}
            </div>
            <div class="col-md-3">
                {{Form::checkbox('check_active',1,false,['class' => ''])}}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3 col-md-offset-3">
                {{Form::submit('Добавить',['class'=>'btn btn-primary'])}}
            </div>
        </div>

        {{ Form::close() }}
    </div>
@endsection