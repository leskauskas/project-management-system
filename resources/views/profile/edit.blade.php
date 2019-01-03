@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-12 globalCard profileCard text-center">
                <div class="profileAvatar d-flex justify-content-center">
                    <user-avatar fname="{{$user->name}}" lname="{{$user->lastname}}"></user-avatar>
                </div>
                <div class="profileInfo">
                    <h3>{{$user->name}} {{$user->lastname}}</h3>
                    <h6 class="text-muted"><i class="fas fa-envelope"></i> {{$user->email}}</h6>
                    <h6 class="text-muted"><i class="fas fa-map-marker-alt"></i> {{$user->location}}</h6>
                </div>  
            </div>

            <div class="col-12 globalCard profileEdit mt-2">
                <form method="POST" action="{{route('profile.update', $user)}}">
                    {{ csrf_field() }}
                    {{ method_field('patch') }}

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">First name</label>
                                <input class="form-control" type="text" name="name" value="{{ $user->name }}" />
                            </div>
        
                            <div class="form-group">
                                <label for="lastname">Last name</label>
                                <input class="form-control" type="text" name="lastname" value="{{ $user->lastname }}" />
                            </div>
        
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input class="form-control" type="email" name="email" value="{{ $user->email }}" />
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="about">About</label>
                                <textarea class="form-control" type="text" name="about" value="{{ $user->about }}" style="height: 121px">{{ $user->about }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="location">Location</label>
                                <input class="form-control" type="text" name="location" value="{{ $user->location }}" />
                            </div>
                        </div>
                    </div>

                    {{-- <input type="password" name="password" />
                    <input type="password" name="password_confirmation" /> --}}
                
                    <button class="btn btn-global" type="submit">Update</button>
                </form>
            </div>
        </div>


    </div>
@endsection 