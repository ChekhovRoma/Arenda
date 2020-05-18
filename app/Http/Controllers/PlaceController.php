<?php

namespace App\Http\Controllers;

use App\PlaceSchema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\PlaceRequest;
use Illuminate\Http\Request;
use App\Ad;
use App\Place;

class PlaceController extends Controller
{

    public function getPlace($id)
    {
        $place = Place::where('id',$id)
            ->get();

        return response(json_encode($place[0]));
    }

    public function getSchemaById(Request $request) // убрать в плейссхема контроллер?
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

    public function addPlace()
    {
        return view('addPlace');
    }

    public function savePlace(PlaceRequest $request)
    {
        $data = $request->post();

        $request->validated();

        $place = new Place();
        $place->name = $data['name'];
        $place->city =  $data['city'];
        $place->address =   $data['address'];
        $place->owner_id = Auth::id();
        $place->place_type_id =   (integer) $data['place_type_id'];
        $place->floors_num =  (integer) $data['floors_num'];
        $place->rooms_num =  (integer) $data['rooms_num'];
        $place->phone =   $data['phone'];
        $place->description =   $data['description'];
        $place->open_at =   '13:00:00';
        $place->closed_at =   '14:00:00';

        if($request->hasFile('photos')){
            $photos = [];
            $files = $request->file('photos');
            foreach ($files as $file){
                $newFileName = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/images/place_photos', $newFileName);
                //$photos[] = $newFileName;
                array_push($photos, $newFileName);
            }
            $place->photos = json_encode( $photos);
        }

        $place->save();
        var_dump("Удачно");
    }
}
