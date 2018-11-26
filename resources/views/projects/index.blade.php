@extends('layouts.app')

@section('content')

<h1>
    Projects
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newProjModal">New Project</button>
</h1>
    @if (count($projects) > 0)
        <ul class="list-group">
            @foreach ($projects as $proj)
                <li class="list-group-item">
                <h5><a href="/projects/{{$proj->id}}">{{$proj->name}}</a></h5>
                    <h6><b>Created at: </b>{{$proj->created_at}} {{$proj->user->name}}</h6>
                </li>
            @endforeach
            {{$projects->links()}}
        </ul>
    @else
        <p>No projects yet</p>
    @endif 

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
                            {{ Form::label('priority', 'Priority')}}
                            {{ Form::select('priority', ['high' => 'High', 'medium' => 'Medium', 'small' => 'Small'], 'S', ['class' => 'form-control']) }}
                        </div>
                        {{ Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection