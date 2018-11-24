@extends('layouts.app')

@section('content')

<h1>Projects</h1>
    @if (count($projects) > 0)
        <ul class="list-group">
            @foreach ($projects as $proj)
                <li class="list-group-item">
                <h5><a href="/projects/{{$proj->id}}">{{$proj->name}}</a></h5>
                    <h6><b>Created at: </b>{{$proj->created_at}}</h6>
                </li>
            @endforeach
        </ul>
    @else
        <p>No projects yet</p>
    @endif    
@endsection