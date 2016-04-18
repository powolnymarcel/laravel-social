<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function utilisateur(){
        return $this->belongsTo('App\Utilisateur');
    }
}
