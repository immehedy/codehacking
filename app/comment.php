<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    //
    protected $fillable = [
        'post_id',
        'is_active',
        'author',
        'email',
        'body',
    ];

    public function post(){
      return $this->belongsTo('App\post')
      
    }

    public funtion replies(){
      return $this->hasMany('App\commentreply');
    }
}
