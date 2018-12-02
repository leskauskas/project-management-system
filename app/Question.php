<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function project(){
        return $this->belongsTo('App\Project', 'project_id');
    }
}
