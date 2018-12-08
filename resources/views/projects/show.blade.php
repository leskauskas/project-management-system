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

        <div class="progress" style="height: 5px">
            <div class="progress-bar" role="progressbar" aria-valuenow="{{$project->getProjectProgress()}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$project->getProjectProgress()}}%; height: 5px"></div>
        </div>
    
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
                  
                <h5>Tasks {{$doneTasks}}/{{$allTasks}}</h5> 
                @foreach ($project->tasks as $proj_task)
                    <div class="globalCard p-1 mt-1 row" style="border-left: 3px solid #3490dc; border-radius: 0;">
                        <div class="col-9">
                            <h6><b>{{$proj_task->task_name}}</b><span class="badge badge-danger ml-1">{{$proj_task->status}}</span></h6>
                            <h6><b>Due: </b>{{$proj_task->due_date}}</h6>
                        </div>
                        <div class="col-3">
                            <a data-toggle="modal" data-target="#exampleModalLong-{{ $loop->iteration }}"><i class="far fa-edit"></i></a>
                            <a><i class="far fa-trash-alt"></i></a>
                        </div>
                            
                        <!-- Edit task modal -->
                        <div class="modal fade" id="exampleModalLong-{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">{{$proj_task->task_name}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    {!! Form::model($proj_task, [
                                        'method' => 'PATCH',
                                        'route' => ['tasks.update', $proj_task->id]
                                    ]) !!}
                            
                                    <div class="form-group">
                                        {{ Form::label('task_name', 'Task name')}}
                                        {{ Form::text('task_name', $proj_task->task_name, ['class' => 'form-control', 'placeholder' => 'Task name'])}}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::select('status', ['not started' => 'Not Started', 'in progress' => 'In progress', 'done' => 'Done'], $proj_task->status, ['class' => 'form-control']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('due_date', 'Due')}}
                                        {{ Form::text('due_date', $proj_task->due_date, ['class' => 'form-control', 'placeholder' => 'Due date'])}}
                                    </div>
                                    {{ Form::submit('Update', ['class' => 'btn btn-primary'])}}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                            </div>
                        </div>
   
                    </div>
                @endforeach 
            </div>
            <div class="col-6">
            <h5>Notes</h5>
            </div>
        </div>
    </div>
    
@endsection