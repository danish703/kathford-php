<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  protected $table = 'project';
    protected $fillable = ['name','image','description','company_id','user_id'];

    public function company(){
      return $this->belongsTo('App\Company');
    }

    public function user(){
      return $this->belongsToMany('App\User');
    }

    public function task(){
      return $this->hasMany('App\Task');
    }
    public function comments(){
      return $this->morphMany('App\Comment','project');
    }
}
