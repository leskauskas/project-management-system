@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{$task->task_name}}</h2>
        
        {!! Form::model($task, [
            'method' => 'PATCH',
            'route' => ['tasks.update', $task->id]
        ]) !!}

            <div class="form-group">
                {{ Form::label('task_name', 'Task name')}}
                {{ Form::text('task_name', '', ['class' => 'form-control', 'placeholder' => 'Task name'])}}
            </div>
            <div class="form-group">
                {{ Form::select('status', ['not started' => 'Not Started', 'in progress' => 'In progress', 'done' => 'Done'], null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('due_date', 'Due')}}
                {{ Form::date('due_date', \Carbon\Carbon::now(), ['class' => 'form-control', 'placeholder' => 'Due date'])}}
            </div>
            {{ Form::submit('Update', ['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
    </div>
@endsection