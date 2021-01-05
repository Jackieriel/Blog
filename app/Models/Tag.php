<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable =['tag'];
    
    //Setup relationship with the post, a many relationship
    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }
}
