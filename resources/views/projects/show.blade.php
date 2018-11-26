@extends('layouts.app')

@section('content')

    <h1>{{$project->name}}</h1>
    <p>{{$project->description}}</p>
    {{$project->tasks->task_name}}

    {!! Form::open(['action' => ['ProjectsController@destroy', $project->id], 'method' => 'POST']) !!}
        {{ Form::hidden('_method', 'DELETE')}}
        {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!! Form::close() !!}

@endsection