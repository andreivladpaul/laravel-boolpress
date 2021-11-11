<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts() { //aggiunto relazione con model tag
        return $this->belongsToMany('App\Post');
    }
}
