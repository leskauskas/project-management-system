@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>{{$title}}</h1>
        <p class="btn btn-primary" href="/login" role="button">Log in</p>
        <p class="btn btn-success" href="/register" role="button">Register</p>
    </div>
    
@endsection
