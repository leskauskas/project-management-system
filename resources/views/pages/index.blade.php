@extends('layouts.app')

@section('content')
    <div class="container heading">
        <div class="text-center">
            <h1 class="text-uppercase mt-5">Project Management System</h1>
            <h3>Designed for students</h3>
        </div>
        @guest
            <div class="d-flex justify-content-center">
                <a class="nav-link btn btn-global m-2" href="{{ route('login') }}">{{ __('Login') }}</a>
          
                @if (Route::has('register'))
                    <a class="nav-link btn btn-global text-white m-2" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            </div> 
        @endguest
    </div>
@endsection
