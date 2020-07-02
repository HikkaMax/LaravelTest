<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $table = 'owner';
    public $timestamps = false;

    public function factories()
    {
        return $this->belongsToMany('App\Factory');
    }
}
