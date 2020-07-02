<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factory extends Model
{
    protected $table = 'factory';
    protected $fillable = 'name';
    public $timestamps = false;

    public function owners()
    {
        return $this->belongsToMany('App\Owner');
    }

    public function tankers()
    {
        return $this->hasMany('App\Tanker');
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    }
}
