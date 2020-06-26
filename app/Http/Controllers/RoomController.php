<?php

namespace App\Http\Controllers;

use App\Communication;
use App\Http\Requests\RoomRequest;
use App\Room;
use App\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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

    public function saveRoom (RoomRequest $request)
    {
        $data = $request->post();
       //  $request->validated();
        $room = Room::where('name', $data['name'])
                      ->where('user_id', Auth::id())->first();
        if (!$room){
            $room = new Room();
        }
        $room->name = $data['name'];
        $room->area = (float)$data['area'];
        $room->price = (float)$data['price'];
        $room->user_id = Auth::id();
        $room->place_id = (integer)$data['placeId'];
        $room->floor =   (integer) $data['floor'];
        $room->description = $data['description'];
        $room->alias = $data['alias'];

        if($request->file('photos')){
            $photos = [];
            $files = $request->file('photos');
           foreach ($files as $file){
                $newFileName = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/images/room_photos', $newFileName);
                //$photos[] = $newFileName;
                array_push($photos, $newFileName);
            }
            $room->photos = json_encode($photos);
        }

        $room->save();
        return response(json_encode($room->name));
    }

    public function getIfExists (Request $request) {
        $name = $request->post('name');
        $room = Room::where('name', $name)
                    ->where('user_id', Auth::id())->first();
        if (!$room){
            return response(json_encode(0));
        }
        return response(json_encode($room));
    }
}
