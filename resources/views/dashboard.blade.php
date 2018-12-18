@extends('layouts.app')

@section('content')
<div class="container">
    {{-- new project modal --}}
    <div class="modal fade" id="newProjModal" tabindex="-1" role="dialog" aria-labelledby="newProjModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['action' => 'ProjectsController@store', 'method' => 'POST']) !!}
                        <div class="form-group">
                            {{ Form::text('project', '', ['class' => 'form-control', 'placeholder' => 'My Project'])}}
                        </div>
                        <div class="form-group">
                            {{ Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description'])}}
                        </div>
                        <div class="form-group">
                            {{ Form::label('due_date', 'Due')}}
                            {{ Form::date('due_date', \Carbon\Carbon::now(), ['class' => 'form-control', 'placeholder' => 'Due date'])}}
                        </div>
                        <div class="form-group">
                            {{ Form::label('priority', 'Priority')}}
                            {{ Form::select('priority', ['High priority' => 'High', 'Medium priority' => 'Medium', 'Small priority' => 'Small'], 'S', ['class' => 'form-control']) }}
                        </div>
                        {{ Form::submit('Submit', ['class' => 'btn btn-global'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-8 dashboardProjectsColumn">
            <h3 class="my-4">My projects
                <button type="button" class="btn btn-global btn-sm ml-1" data-toggle="modal" data-target="#newProjModal">Add new project</button>
            </h3>
            @if (count($projects) > 0)   
                @foreach ($projects as $proj)
                    <a href="/projects/{{$proj->id}}">
                        <div class="globalCard projectCard mb-2">
                            <div class="projectCard-title">
                                <h5>{{$proj->name}}</h5>
                            <span class="globalBadge">{{$proj->priority}}</span>
                            </div> 
                            <p><b>Due date: </b>{{$proj->due_date}}</p>
                            <div class="progress" style="height: 5px">
                                <div class="progress-bar" role="progressbar" aria-valuenow="{{$proj->getProjectProgress()}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$proj->getProjectProgress()}}%; height: 5px"></div>
                            </div>
                        </div>   
                    </a>
                @endforeach  
            @else
                <p>No projects yet</p>
            @endif 
        </div>

        <div class="col-4 dashboardCheckColumn">
            <h3 class="my-4"><i class="fas fa-list --accentColor"></i> My personal checklist</h3>
            {!! Form::open(['action' => 'ChecklistsController@store', 'method' => 'POST']) !!}
                <div class="form-group">
                    {{ Form::text('checklist_title', '', ['class' => 'form-control globalInput', 'placeholder' => 'Add your task here...'])}}
                </div>
                <div class="form-group">
                    {{ Form::hidden('is_done', '0', ['class' => 'form-control']) }}
                </div>
                {{-- {{ Form::submit('Submit', ['class' => 'btn btn-global btn-sm'])}} --}}
            {!! Form::close() !!}

                @foreach ($checklists as $c)

                    <div class="globalCard mb-2">
                        <div class="checklistHolder">
                            <p class="m-0">{{$c->checklist_title}} {{$c->is_done}}</p>
                            {!! Form::model($c, [
                                'method' => 'PATCH',
                                'route' => ['checklists.update', $c->id]
                            ]) !!}
    
                            @if ($c->is_done == 0)
                                <div class="form-group mb-0"> 
                                    {{ Form::hidden('is_done', '1', ['class' => 'form-control'])}}
                                </div>
                                {{ Form::submit('Done', ['class' => 'btn btn-global btn-sm'])}}                                                     
                            @else
                                <div class="form-group mb-0"> 
                                    {{ Form::hidden('is_done', '0', ['class' => 'form-control'])}}
                                </div>
                                {{ Form::submit('Not done', ['class' => 'btn btn-global btn-sm'])}}                            
                            @endif
                            {!! Form::close() !!}
                        </div>
                    </div>
                    
                    
                @endforeach
                
        </div>

    </div>

</div>
@endsection
