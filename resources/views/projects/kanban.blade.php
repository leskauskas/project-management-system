@extends('layouts.app')

@section('content')
    <div class="container kanbanBoardContainer">

        <div class="column notStarted">
            <div class="columnHeader">
                <h4>Not Started</h4>
            </div>
            @foreach ($project->tasks as $t)
                @if ($t->status == 'not started')
                    <div class="globalCard mb-2">
                        <p>{{$t->task_name}}</p>  
                    </div>
                @endif
            @endforeach
        </div>
        <div class="column inProgress">
            <div class="columnHeader">
                <h4>In Progress</h4>
            </div>
            @foreach ($project->tasks as $t)
                @if ($t->status == 'in progress')
                    <div class="globalCard mb-2">
                        <p>{{$t->task_name}}</p>  
                    </div>   
                @endif
            @endforeach
        </div>
        <div class="column done">
            <div class="columnHeader">
                <h4>Done</h4>
            </div>
            @foreach ($project->tasks as $t)
                @if ($t->status == 'done')
                    <div class="globalCard mb-2">
                        <p>{{$t->task_name}}</p>  
                    </div>  
                @endif
            @endforeach
        </div>

    </div>
@endsection