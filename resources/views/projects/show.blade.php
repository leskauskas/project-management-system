@extends('layouts.app')

@section('content')

    <h1>{{$project->name}}</h1>
    <p>{{$project->description}}</p>

    {!! Form::open(['action' => ['ProjectsController@destroy', $project->id], 'method' => 'POST']) !!}
        {{ Form::hidden('_method', 'DELETE')}}
        {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!! Form::close() !!}

@endsection