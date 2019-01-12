@extends('layouts.app')

@section('content')
    {{-- <div class="container heading">
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
    </div> --}}


    <div id="landing">
        <div class="container">
            <div class="landing-content row pt-5">  
                <div class="col-lg-12">
                    <h1 class="text-uppercase text-white text-center">Project management system</h1>
                    <h2 class="text-white text-center">Designed for students</h2>
                    <div class="row mt-5">
                        <div class="col-lg-12">
                            <div class="d-flex justify-content-center">
                                <a class="nav-link btn btn-landing btn-lg mr-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                            
                                @if (Route::has('register'))
                                    <a class="nav-link btn btn-landing btn-lg ml-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>


@endsection
