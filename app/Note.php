<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['note_content'];

    public function project(){
        return $this->belongsTo('App\Project', 'project_id');
    }
}
