<?php

namespace App\Http\Controllers;

use App\PlaceSchema;
use Illuminate\Http\Request;
use App\Ad;
use App\Place;

class PlaceController extends Controller
{


    public function getSchemaById(Request $request)
    {
        $placeId = $data = $request->post('placeId');

        $schema = PlaceSchema::where('place_id', $placeId)
            ->get();

        return response(json_encode($schema[0]));
    }

    public function filter (Request $request){
        $places = Place::all();
        $ads = $places->ads()->where('name', $request->post('name'));
        var_dump($ads);
    }
}
