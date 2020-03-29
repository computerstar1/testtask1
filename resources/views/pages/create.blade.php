@extends('layout.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
      {!! Form::open(['action' => 'TasksController@store', 'method' => 'POST']) !!}
          <div class="form-group">
              {{Form::label('name', 'Name')}}
              {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'add Name'])}}
          </div> 
      {!! Form::open(['action' => 'TasksController@store', 'method' => 'POST']) !!}     
          <div class="form-group">
              {{Form::label('priority', 'Priority')}}
              {{Form::text('priority', '', ['class' => 'form-control', 'placeholder' => 'add Priority'])}}
          </div> 
          {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
      {!! Form::close()!!}
    </div>
  </div>
@endsection