<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country';
    public $timestamps = false;

    public function factories()
    {
        return $this->hasMany('App\Factory');
    }
}
