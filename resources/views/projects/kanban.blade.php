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
                        @php
                            $today = date("Y-m-d");
                            $dueDate = date("Y-m-d", strtotime($t->due_date));
                            $due = false;

                            $date1=date_create($today);
                            $date2=date_create($dueDate);
                            $diff=date_diff($date1,$date2);
                    
                            if ((int)$diff->format("%r%a") >= 0 && (int)$diff->format("%r%a") <=5 ) {
                                $due = true;
                            }
                        @endphp
                        <task-due duedate="{{date('Y-m-d', strtotime($t->due_date))}}" isdue={{$due}}></task-due>
                        <span class="badge">
                            @php
                                if ((int)$diff->format("%r%a") < 0) {
                                    echo 'Past deadline';
                                }
                                else{
                                    echo $diff->format("%d days");
                                }
                            @endphp         
                        </span>
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
                        @php
                            $today = date("Y-m-d");
                            $dueDate = date("Y-m-d", strtotime($t->due_date));
                            $due = false;

                            $date1=date_create($today);
                            $date2=date_create($dueDate);
                            $diff=date_diff($date1,$date2);
                    
                            if ((int)$diff->format("%r%a") >= 0 && (int)$diff->format("%r%a") <=5 ) {
                                $due = true;
                            }
                        @endphp
                        <task-due duedate="{{date('Y-m-d', strtotime($t->due_date))}}" isdue={{$due}}></task-due>
                        <span class="badge">
                            @php
                                if ((int)$diff->format("%r%a") < 0) {
                                    echo 'Past deadline';
                                }
                                else{
                                    echo $diff->format("%d days");
                                }
                            @endphp         
                        </span>
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
                        @php
                            $today = date("Y-m-d");
                            $dueDate = date("Y-m-d", strtotime($t->due_date));
                            $due = false;

                            $date1=date_create($today);
                            $date2=date_create($dueDate);
                            $diff=date_diff($date1,$date2);
                    
                            if ((int)$diff->format("%r%a") >= 0 && (int)$diff->format("%r%a") <=5 ) {
                                $due = true;
                            }
                        @endphp
                        <task-due duedate="{{date('Y-m-d', strtotime($t->due_date))}}" isdue={{$due}}></task-due>
                        <span class="badge">
                            @php
                                if ((int)$diff->format("%r%a") < 0) {
                                    echo 'Past deadline';
                                }
                                else{
                                    echo $diff->format("%d days");
                                }
                            @endphp         
                        </span>
                    </div>  
                @endif
            @endforeach
        </div>

    </div>
@endsection