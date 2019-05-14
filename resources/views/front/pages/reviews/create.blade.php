@extends('front-index')
@section('title', 'Добавить отзыв')
@section('content')
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <div class="col-md-9">
        {{ Form::open(array('route' => 'reviews.store')) }}

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
        <div class="g-recaptcha" data-sitekey="6LdbUqMUAAAAAKbZq7RoW0RQKZkPj--P2hgq5vov"></div>
        <div class="form-group">
            <div class="col-md-3 col-md-offset-3">
                {{Form::submit('Добавить',['class'=>'btn btn-primary'])}}
            </div>
        </div>

        {{ Form::close() }}
    </div>
@endsection