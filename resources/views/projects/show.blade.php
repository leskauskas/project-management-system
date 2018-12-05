@extends('layouts.app')

@section('content')
    <div class="container">
        
        {{-- DELETE PROJECT --}}
        {{-- {!! Form::open(['action' => ['ProjectsController@destroy', $project->id], 'method' => 'POST']) !!}
            {{ Form::hidden('_method', 'DELETE')}}
            {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!! Form::close() !!} --}}

        <h1>{{$project->name}} </h1>
        <p>{{$project->description}}</p>
    
        <hr>
        <div class="row mt-1">
            <div class="col-6">
                {!! Form::open(['action' => 'TasksController@store', 'method' => 'POST']) !!}
                    <div class="form-group">
                        {{ Form::label('task_name', 'Task name')}}
                        {{ Form::text('task_name', '', ['class' => 'form-control', 'placeholder' => 'Task name'])}}
                        {{ Form::hidden('project_id', $project->id) }}
                    </div>
                    <div class="form-group">
                        {{ Form::hidden('status', 'not started', ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('due_date', 'Due')}}
                        {{ Form::date('due_date', \Carbon\Carbon::now(), ['class' => 'form-control', 'placeholder' => 'Due date'])}}
                    </div>
                    {{ Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                {!! Form::close() !!}
                <hr>
                <h5>Tasks</h5>
                @foreach ($project->tasks as $proj_task)
                    <div class="card p-1 mt-1" style="border-left: 3px solid #3490dc">
                        <h6><b>{{$proj_task->task_name}}</b><span class="badge badge-danger">{{$proj_task->status}}</span></h6>
                        <h6><b>Due: </b>{{$proj_task->due_date}}</h6>
                    </div> 
                @endforeach 
            </div>
            <div class="col-6">
            <h5>Notes</h5>
            </div>
        </div>
    </div>
@endsection