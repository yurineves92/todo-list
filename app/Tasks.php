<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $fillable = ['title','content','started','ended','status','category_id','user_id'];

    public function category(){
        return $this->belongsTo('App\Categories');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
