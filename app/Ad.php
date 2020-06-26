<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    public $timestamps = false;

    public function getId(){
        return $this->id;
    }

    public function user () {
        return $this->belongsTo('App\User');
    }

    public function room () {
        return $this->belongsTo('App\Room');
    }
}
