<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['task_name', 'status', 'due_date'];
    
    public function project(){
        return $this->belongsTo('App\Project', 'project_id');
    }
}
