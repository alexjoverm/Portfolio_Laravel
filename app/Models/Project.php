<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $table = 'users';

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category')->withTimestamps();
    }
    public function assets()
    {
        return $this->belongsToMany('App\Models\Asset');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
