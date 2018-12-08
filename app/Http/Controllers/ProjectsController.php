<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use App\Task;

class ProjectsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')->paginate(5);
        return view('projects.index')->with('projects', $projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'project' => 'required',
            'description' => 'required'
        ]);

        $project = new Project;
        $project->name = $request->input('project');
        $project->description = $request->input('description');
        $project->priority = $request->input('priority');
        $project->user_id = auth()->user()->id;
        $project->save();

        return redirect('/dashboard')->with('success', 'New project added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        $allProjects = Task::where('project_id', '=', $id)->count();
        $doneProjects = Task::where([
            ['status','=','done'],
            ['project_id', '=', $id]
            ])->count();

        // percentage of a project done
        $projectProgress = ($doneProjects/$allProjects)*100;

        //return view('projects.show')->with('project', $single_project);
        return view('projects.show', compact('project', 'allProjects', 'doneProjects', 'projectProgress'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect('/projects')->with('success', 'Project deleted');
    }
}
