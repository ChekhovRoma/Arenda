<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function ads () {
        return $this->hasMany('App\Ad', 'place_id');
    }

    public function user () {
        return $this->belongsTo('App\User', 'owner_id');
    }

    public function rooms () {
        return $this->hasMany('App\Room');
    }

    public function placeType () {
        return $this->belongsTo('App\PlaceType');
    }

    public function schema () {
        return $this->hasOne('App\PlaceSchema');
    }
}
