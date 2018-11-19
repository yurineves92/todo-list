<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['description'];

    public function tasks(){
        return $this->hasMany('App\Tasks');
    }
}
