<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name','day','hours','user_id','project_id','company_id'];

    public function company(){
      return $this->belongsTo('App\Company');
    }

    public function user(){
      return $this->belongsToMany('App\User');
    }

    public function project(){
      return $this->belongsTo('App\Project');
    }

    public function comments(){
      return $this->morphMany('App\Comment','task');
    }
}
