@extends('layouts.app')

@section('content')

    <h1>{{$project->name}}</h1>
    <p>{{$project->description}}</p>
   
    {!! Form::open(['action' => ['ProjectsController@destroy', $project->id], 'method' => 'POST']) !!}
        {{ Form::hidden('_method', 'DELETE')}}
        {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!! Form::close() !!}

    <hr>
    <div class="row mt-1">
        <div class="col-6">
            <h5>Tasks</h5>
            {!! Form::open(['action' => 'TasksController@store', 'method' => 'POST']) !!}
                <div class="form-group">
                    {{ Form::text('task_name', '', ['class' => 'form-control', 'placeholder' => 'Task name'])}}
                    {{ Form::hidden('project_id', $project->id) }}
                </div>
                <div class="form-group">
                    {{ Form::hidden('status', 'not started', ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::date('due_date', \Carbon\Carbon::now(), ['class' => 'form-control', 'placeholder' => 'Due date'])}}
                </div>
                {{ Form::submit('Submit', ['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
            
        </div>
        <div class="col-6">
           @foreach ($project->tasks as $proj_task)
                <div class="card p-1 mt-1" style="border-left: 3px solid #3490dc">
                    <h6><b>{{$proj_task->task_name}}</b></h6>
                    <h6><b>Due: </b>{{$proj_task->due_date}}</h6>
                </div> 
            @endforeach 
        </div>
    </div>
    

@endsection