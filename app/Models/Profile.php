<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    // Relationship with profile
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    protected $fillable = ['user_id','avatar','twitter','facebook','youtube','about'];
}
