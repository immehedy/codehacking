<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class commentreply extends Model
{
    //
    protected $fillable = [
        'post_id',
        'is_active',
        'author',
        'email',
        'body',
    ];

    public function comment(){

      return $this->belongsTo('App\comment');
    }
}
