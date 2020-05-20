<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Communication extends Model
{
    public function rooms () {
        return $this->belongsToMany('App\Room');
    }
}
