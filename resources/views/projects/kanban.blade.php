@extends('layouts.app')

@section('content')
    <div class="container">
        
        @foreach ($project->tasks as $t)
            @if ($t->status == 'not started')
                <p style="color: red">NOT STARTED: {{$t->task_name}}</p>   
            @elseif ($t->status == 'in progress')
                <p style="color: yellow">IN PROGRESS: {{$t->task_name}}</p>
            @else
                <p style="color: green">DONE: {{$t->task_name}}</p>
            @endif
        @endforeach

    </div>

@endsection