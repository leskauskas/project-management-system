<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function tasks(){
        return $this->hasMany('App\Task');
    }

    public function notes(){
        return $this->hasMany('App\Note');
    }

    public function questions(){
        return $this->hasMany('App\Question');
    }

    public function getProjectProgress(){
        $allTasks = $this->tasks()->count();
        $doneTasks = $this->tasks()->where('status', '=', 'done')->count();
        
        if($allTasks == 0){
            return 0;
        }
        else{
            $projectProgress = ($doneTasks/$allTasks)*100;
            return $projectProgress;
        }
    }
}
