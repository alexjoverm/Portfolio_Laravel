<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $table = 'asset';

    public function projects()
    {
        return $this->belongsToMany('App\Models\Project');
    }
}
