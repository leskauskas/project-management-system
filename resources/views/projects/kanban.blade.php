@extends('layouts.app')

@section('content')
    <a href="{{ URL::previous() }}" class="btn btn-global btn-sm">Back</a>

    <div class="container kanbanBoardContainer"> 
        <div class="column notStarted">
            <div class="columnHeader">
                <h5 class="text-muted">Not Started</h5>
                <hr class="my-2">
            </div>
            @foreach ($project->tasks as $t)
                @if ($t->status == 'not started')
                    <div class="globalCard p-2 mb-2">
                        <p class="m-0">{{$t->task_name}}</p>
                        <span class="badge badge-danger task-due"><i class="far fa-clock"></i> {{$t->due_date}}</span>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="column inProgress">
            <div class="columnHeader">
                <h5 class="text-muted">In Progress</h5>
                <hr class="my-2">
            </div>
            @foreach ($project->tasks as $t)
                @if ($t->status == 'in progress')
                    <div class="globalCard p-2 mb-2">
                        <p class="m-0">{{$t->task_name}}</p>
                        <span class="badge badge-danger task-due"><i class="far fa-clock"></i> {{$t->due_date}}</span>
                    </div>   
                @endif
            @endforeach
        </div>

        <div class="column done">
            <div class="columnHeader">
                <h5 class="text-muted">Done</h5>
                <hr class="my-2">
            </div>
            @foreach ($project->tasks as $t)
                @if ($t->status == 'done')
                    <div class="globalCard p-2 mb-2">    
                        <p class="m-0">{{$t->task_name}}</p>
                        <span class="badge badge-danger task-due"><i class="far fa-clock"></i> {{$t->due_date}}</span>
                    </div>  
                @endif
            @endforeach
        </div>

    </div>
@endsection