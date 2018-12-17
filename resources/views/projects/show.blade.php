@extends('layouts.app')

@section('content')
    <div class="container mainProjectPage">
        
        {{-- DELETE PROJECT --}}
        {{-- {!! Form::open(['action' => ['ProjectsController@destroy', $project->id], 'method' => 'POST']) !!}
            {{ Form::hidden('_method', 'DELETE')}}
            {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!! Form::close() !!} --}}

        <div class="row">
            <div class="col-7">
                <div class="projectInfo globalCard mb-2">
                    <h1>{{$project->name}} </h1>
                    <p>{{$project->description}}</p>

                    <div class="progress" style="height: 5px">
                        <div class="progress-bar" role="progressbar" aria-valuenow="{{$project->getProjectProgress()}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$project->getProjectProgress()}}%; height: 5px"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="projectTasks">
                            {!! Form::open(['action' => 'TasksController@store', 'method' => 'POST']) !!}
                                <div class="form-group">
                                    {{ Form::text('task_name', '', ['class' => 'form-control globalInput', 'placeholder' => 'Task name'])}}
                                    {{ Form::hidden('project_id', $project->id) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::hidden('status', 'not started', ['class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::date('due_date', \Carbon\Carbon::now(), ['class' => 'form-control globalInput', 'placeholder' => 'Due date'])}}
                                </div>
                                {{ Form::submit('Submit', ['class' => 'btn btn-global btn-sm'])}}
                            {!! Form::close() !!}
                        </div>
                        <hr>
                        @foreach ($project->tasks as $proj_task)
                            <div class="globalCard p-1 mt-1 " style="border-left: 3px solid #3490dc; border-radius: 0;">
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
                </div>
            </div>
            <div class="col-5">
                <div class="projectQuestions globalCard mb-2">
                    <h5 class="m-0">Questions 
                        {{-- new question button --}}
                        <button type="button" class="btn btn-global btn-sm ml-1" data-toggle="modal" data-target="#newQuestionModal">Add new question</button>
                    </h5>
                    {{-- new question modal --}}
                    <div class="modal fade" id="newQuestionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">New question</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    {!! Form::open(['action' => 'QuestionsController@store', 'method' => 'POST']) !!}
                                        <div class="form-group">
                                            {{ Form::text('question_title', '', ['class' => 'form-control', 'placeholder' => 'What is your question?'])}}
                                            {{ Form::hidden('project_id', $project->id) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::hidden('answer', '', ['class' => 'form-control']) }}
                                        </div>
                                        {{ Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($project->questions as $quest)
                    <div class="globalCard mb-2" style="display: flex; justify-content: space-between">
                      
                        <div>
                            <h6>{{$quest->question_title}}</h6>
                            <p class="m-0"><i class="fas fa-arrow-right"></i> {{$quest->answer}}</p>
                        </div>
                        <div>
                            <button type="button" class="btn btn-global btn-sm" data-toggle="modal" data-target="#answerModal-{{ $loop->iteration }}">Answer</button>
                        </div>
                               
                        <!-- answer modal -->
                        <div class="modal fade" id="answerModal-{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">New question</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        {!! Form::model($quest, [
                                            'method' => 'PATCH',
                                            'route' => ['questions.update', $quest->id]
                                        ]) !!}

                                        <div class="form-group">
                                            {{ Form::label('question_title', 'Question') }}
                                            {{ Form::text('question_title', $quest->question_title, ['class' => 'form-control'])}}
                                        </div>
                
                                        <div class="form-group"> 
                                            {{ Form::text('answer', $quest->answer, ['class' => 'form-control', 'placeholder' => 'Answer to the question'])}}
                                        </div>
                                        {{ Form::submit('Submit', ['class' => 'btn btn-primary'])}}                                                     
                                            
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="projectNotes">
                    @if (count($project->notes) == 0)
                        <div class="globalCard">    
                            <button type="button" class="btn btn-global btn-sm" data-toggle="modal" data-target="#noteModal">Add a note</button>
                            <p class="text-muted m-0 text-center">You don't have any notes yet</p>      
                        </div> 
                    @else
                        @foreach ($project->notes as $n)
                            <div class="globalCard">
                                <a href="/notes/{{$n->id}}/edit" class="btn btn-global btn-sm">Edit</a>
                                <p>{!! $n->note_content !!}</p>
                            </div>
                        @endforeach
                    @endif 
                    <!-- note modal -->
                    <div class="modal fade" id="noteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Note</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    {!! Form::open(['action' => 'NotesController@store', 'method' => 'POST']) !!}
                                        <div class="form-group">
                                            {{ Form::textarea('note_content', '', ['id' => 'article-ckeditor', 'class' => 'form-control'])}}
                                            {{ Form::hidden('project_id', $project->id) }}
                                        </div>
                                        
                                        {{ Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection