<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanker extends Model
{
    protected $table = 'tanker';
    public $timestamps = false;

    public function factory()
    {
        return $this->belongsTo('App\Factory');
    }


}
