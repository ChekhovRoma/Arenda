<?php

namespace App\Http\Controllers;

use App\PlaceSchema;
use Illuminate\Http\Request;


class Place extends Controller
{
    public function test(Request $request)
    {
        $data = $request->post();

        $schema = new PlaceSchema();
        $schema->place_Id = 1;
        //$fullSchema = base64_encode($data['fullSchema']);
        $schema->full_schema = $data['fullSchema'];
        $schema->paths = $data['paths'];
        $schema->rooms = $data['rooms'];
        $schema->width = (float)$data['width'];
        $schema->height = (float)$data['height'];
        $schema->save();

        return response($request->post('height'));
    }

    public function getSchemaById(Request $request)
    {
        $placeId = $data = $request->post('placeId');

        $schema = PlaceSchema::where('place_id', $placeId)
            ->get();

        return response(json_encode($schema[0]));
    }
}
