<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    protected $fillable = ['checklist_title', 'is_done'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
