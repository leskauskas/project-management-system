<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question_title', 'is_answered'];

    public function project(){
        return $this->belongsTo('App\Project', 'project_id');
    }
}
