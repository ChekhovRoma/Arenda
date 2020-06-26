<?php

namespace App\Http\Controllers;

use App\PlaceSchema;
use App\PlaceType;
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
        /** @var Place $place */
        $place = Place::find($id);
        if (!$place) {
            abort(404, 'Not found');
        }
        $userEntity = $place->user()->get();
        $user = $userEntity[0];
        $schema = PlaceSchema::where('place_id', $id)->first();
        return view('place', compact('place', 'schema', 'user'));
    }

    public function getSchemaById (Request $request) // убрать в плейссхема контроллер?
    {
        $placeId = $request->post('placeId');

        $schema = PlaceSchema::find($placeId);

        return response(json_encode($schema));
    }

    public function filter (Request $request){
        $places = Place::all();
        $ads = $places->ads()->where('name', $request->post('name'));
        var_dump($ads);
    }

    public function addPlace()
    {
        $placeTypes = PlaceType::all();
        return view('addPlace', compact('placeTypes'));
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
        $place->open_at = '13:00:00';
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
            $place->photos = json_encode($photos);
        }

        $place->save();
        return redirect('/editor/'.$place->id);
    }

}
