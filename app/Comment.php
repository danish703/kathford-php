<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model  
{
    protected $table = 'comment';
    protected $fillable = ['comment','commentable_id','commentable_type','user_id'];

    public function user(){
      return $this->belongsTo('App\User');
    }
}
