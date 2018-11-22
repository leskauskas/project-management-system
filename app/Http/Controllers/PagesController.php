<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $indexData = array(
            'title' => 'Project Management System',
        );
        return view('pages.index')->with($indexData);
    }

    public function about(){
        $aboutUsData = array(
            'title' => 'About Us'
        );
        return view('pages.about')->with($aboutUsData);
    }
}
