<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function utilisateur(){
        return $this->belongsTo('App\Utilisateur');
    }

    public function post(){
        return $this->belongsTo('App\Post');
    }
}
