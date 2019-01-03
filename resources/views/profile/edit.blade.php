@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{route('profile.update', $user)}}">
            {{ csrf_field() }}
            {{ method_field('patch') }}
        
            <input type="text" name="name"  value="{{ $user->name }}" />

            <input type="text" name="lastname"  value="{{ $user->lastname }}" />
        
            <input type="email" name="email"  value="{{ $user->email }}" />
        
            {{-- <input type="password" name="password" />
            <input type="password" name="password_confirmation" /> --}}
        
            <button type="submit">Send</button>
        </form>
    </div>
@endsection 