@extends('layouts.app')

@section('content')

    <h1>{{$project->name}}</h1>
    <p>{{$project->description}}</p>
   
    {!! Form::open(['action' => ['ProjectsController@destroy', $project->id], 'method' => 'POST']) !!}
        {{ Form::hidden('_method', 'DELETE')}}
        {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!! Form::close() !!}

    <div class="row">
        <div class="col-3">
           <h5>Tasks</h5>
                @foreach ($project->tasks as $proj_task)
                    <div class="card">
                        <h6>{{$proj_task->task_name}}</h6>
                    </div> 
                @endforeach 
        </div>
    </div>
    

@endsection