@extends('layout.app')
@section('content')
<h1>edit task</h1>
<div class="panel panel-default">
  <div class="panel-heading">
    {!! Form::open(['action' => ['TasksController@update', $post->id], 'method' => 'POST']) !!}    
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', $post->name, ['class' => 'form-control', 'placeholder' => 'add Name'])}}
        </div> {!! Form::open(['action' => 'TasksController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('priority', 'Priority')}}
            {{Form::text('priority', $post->priority, ['class' => 'form-control', 'placeholder' => 'add Priority'])}}
        </div> 
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Update', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection