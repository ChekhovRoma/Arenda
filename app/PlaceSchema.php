<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaceSchema extends Model
{
    protected $fillable = array('place_id', 'full_schema', 'rooms', 'paths', 'width', 'height');

    protected $guarded = array('id');
}
