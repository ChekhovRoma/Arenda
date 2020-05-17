<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function ads () {
        return $this->hasMany('App\Ad', 'place_id');
    }
}
