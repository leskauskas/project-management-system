@extends('layouts.app')

@section('content')
<div class="container">
    {{-- new project modal --}}
    <div class="modal fade" id="newProjModal" tabindex="-1" role="dialog" aria-labelledby="newProjModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
                            {{ Form::select('priority', ['high' => 'High', 'medium' => 'Medium', 'small' => 'Small'], 'S', ['class' => 'form-control']) }}
                        </div>
                        {{ Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-8">
            <h5>Projects
                    <button type="button" class="btn btn-primary ml-1" data-toggle="modal" data-target="#newProjModal">+</button>
            </h5>
            @if (count($projects) > 0)
                <ul class="list-group mt-3">
                    @foreach ($projects as $proj)
                        <li class="list-group-item">
                            <h5><a href="/projects/{{$proj->id}}">{{$proj->name}}</a></h5>
                            <h6><b>Due: </b>{{$proj->due_date}}</h6>
                            <div class="progress" style="height: 5px">
                                <div class="progress-bar" role="progressbar" aria-valuenow="{{$proj->getProjectProgress()}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$proj->getProjectProgress()}}%; height: 5px"></div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No projects yet</p>
            @endif 
        </div>
        <div class="col-4">
            <h5>My personal checklist</h5>
            {!! Form::open(['action' => 'ChecklistsController@store', 'method' => 'POST']) !!}
                <div class="form-group">
                    {{ Form::text('checklist_title', '', ['class' => 'form-control', 'placeholder' => 'title'])}}
                </div>
                <div class="form-group">
                    {{ Form::hidden('is_done', '0', ['class' => 'form-control']) }}
                </div>
                {{ Form::submit('Submit', ['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
         
                @foreach ($checklists as $c)
                    <li class="list-group-item">
                        {{$c->checklist_title}}
                    </li>
                @endforeach    
        
        </div>
    </div>
        

        


</div>
@endsection
