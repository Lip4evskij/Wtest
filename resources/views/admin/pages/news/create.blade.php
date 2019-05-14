@extends('admin.admin-index')
@section('title', 'Добавить новость')
@section('content')
      <div class="col-md-9">
            {{ Form::open(array('route' => 'admin-panel.store','files' => true)) }}

            <div class="form-group first_element">
                  <div class="col-md-3">
                        {{Form::label('title','Заголовок')}}
                  </div>
                  <div class="col-md-9">
                        {{Form::text('title',null,['class' => 'form-control'])}}
                  </div>
            </div>

            <div class="form-group">
                  <div class="col-md-3">
                        {{Form::label('image','Изображение')}}
                  </div>
                  <div class="col-md-9">
                        {{Form::file('image')}}
                  </div>
            </div>

            <div class="form-group">
                  <div class="col-md-3">
                        {{Form::label('content','Текст новости')}}
                  </div>
                  <div class="col-md-9">
                        {{Form::textarea('content',null,['class' => 'form-control'])}}
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
                  <div class="col-md-12 col-md-offset-3">
                        {{Form::submit('Добавить',['class'=>'btn btn-primary'])}}
                  </div>
            </div>

            {{ Form::close() }}
      </div>
@endsection