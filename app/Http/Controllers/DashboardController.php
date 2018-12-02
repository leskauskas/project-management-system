<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use App\Checklist;

class DashboardController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

       
        

        $projects = $user->projects;
        $checklists = $user->checklists;
        //return view('dashboard')->with('projects', $user->projects);
        return view('dashboard')->with(compact('projects', 'checklists'));
    }
}
