<?php

namespace App\Http\Controllers;

use App\PlaceSchema;
use Illuminate\Http\Request;

class PlaceSchemaController extends Controller
{
    public function fetchSchema(Request $request)
    {
        $data = $request->post();
        $schema = PlaceSchema::where('place_id', $data['placeId'])->first();
        if (!$schema){
            $schema = new PlaceSchema();
        }
        $schema->place_Id = $data['placeId'];
        //$schema->full_schema = $data['fullSchema'];
        $schema->paths = $data['paths'];
        $schema->rooms = $data['rooms'];
        $schema->doors = $data['doors'];
        $schema->windows = $data['windows'];
        $schema->width = (float)$data['width'];
        $schema->height = (float)$data['height'];
        $schema->save();

        return response($request->post('height'));
    }


}
