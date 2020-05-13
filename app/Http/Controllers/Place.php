<?php

namespace App\Http\Controllers;

use App\PlaceSchema;
use Illuminate\Http\Request;


class Place extends Controller
{
    public function test(Request $request)
    {

       //$posts = json_decode($request->post(), true);

//        $schema = new PlaceSchema();
//        $schema->place_Id = 1;
//        $schema->full_schema = 'test';
//        $schema->rooms = $posts['width'];
//        $schema->paths = 'test';
//        $schema->width = 4;
//        $schema->height = 4;
//        $schema->save();


        return response($request->post());
    }
}
