<?php

namespace App;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    public function posts(){
        return $this->hasMany('App\Post');
    }
    public function likes(){
        return $this->hasMany('App\Like');
    }
}
