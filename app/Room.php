<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function user () {
        return $this->belongsTo('App\User');
    }

    public function place () {
        return $this->belongsTo('App\Place');
    }

    public function communications () {
        return $this->belongsToMany('App\Communications');
    }
}
