<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaceSchema extends Model
{
    protected $fillable = array('place_id', 'rooms', 'paths', 'width', 'height');

    protected $guarded = array('id');

    public function place () {
        return $this->belongsTo('App\Place');
    }
}
