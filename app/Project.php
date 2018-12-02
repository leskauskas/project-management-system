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
}
