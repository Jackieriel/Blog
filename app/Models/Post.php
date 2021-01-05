<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    // implements soft delete
    use SoftDeletes;

    // Editable fields
    protected $fillable = [
        'title', 'content', 'category_id', 'featured','slug'
    ];

    // Accessor setup for feature images. manipulate before giving out from the db
    public function getFeaturedAttribute($featured)
    {
        return asset($featured);
    }


    // implements soft delete
    protected $dates = ['deleted_at'];

    // Relationship with the category model
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    // Relationship with tags
    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }
}
 