@extends('layouts.app')

@section('content')
    <div class="container kanbanBoardContainer">

        <div class="column notStarted">
            <div class="columnHeader">
                <h5 class="text-muted">Not Started</h5>
                <hr class="my-2">
            </div>
            @foreach ($project->tasks as $t)
                @if ($t->status == 'not started')
                    <div class="globalCard p-3 mb-2">
                        <p class="m-0">{{$t->task_name}}</p>
                        <hr class="my-1">
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
                    <div class="globalCard mb-2">
                        <p class="m-0">{{$t->task_name}}</p>
                        <hr class="my-1"> 
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
                    <div class="globalCard mb-2">    
                        <p class="m-0">{{$t->task_name}}</p>
                        <hr class="my-1">
                    </div>  
                @endif
            @endforeach
        </div>

    </div>
@endsection