<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
    protected $fillable = ['name','description','user_id'];

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function project(){
      return $this->hasMany('App\Project');
    }

    public function task(){
      return $this->hasMany('App\Task');
    }

    public function comments(){
      return $this->morphMany('App\Comment','Company');
    }

}
