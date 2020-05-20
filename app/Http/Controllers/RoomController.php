<?php

namespace App\Http\Controllers;

use App\Communication;
use App\Http\Requests\RoomRequest;
use App\Room;
use App\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function addRooms ($id) {
        $place = Place::find($id);
        if (!$place || $place->user->id != Auth::id()) {
            abort(403, 'Access denied');
        }
        $schema = $place->schema;
        $communications = Communication::all();
        return view('addRooms', compact(['schema', 'communications']));
    }

    public function saveRoom (Request $request)
    {
        //$data = $request->post();
        // $request->validated();
//        $room = new Room();
//        $room->name = $data['name'];
//        $room->area = $data['area'];
//        $room->price = $data['price'];
//        $room->user_id = Auth::id();
//        $room->place_id = $data['placeId'];
//        $room->floor =   (integer) $data['floor'];
//        $room->description =   $data['description'];
//
//        if($request->hasFile('photos')){
//            $photos = [];
//            $files = $request->file('photos');
//            foreach ($files as $file){
//                $newFileName = time() . $file->getClientOriginalName();
//                $file->move(public_path() . '/images/place_photos', $newFileName);
//                //$photos[] = $newFileName;
//                array_push($photos, $newFileName);
//            }
//            $room->photos = json_encode($photos);
//        }
//
//        $room->save();
        return response($request->post('name'));
    }
}
