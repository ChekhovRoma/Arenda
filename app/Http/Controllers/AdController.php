<?php

namespace App\Http\Controllers;

use App\AdScout;
use App\PlaceType;
use App\User;
use App\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdController extends Controller
{
    public function getAllAds()
    {
        $ads = Ad::paginate(2);
        $placeTypes = PlaceType::all();

        return view('welcome', compact(
            ['placeTypes', $placeTypes,
                'ads', $ads,

            ]));
    }

    public function getUserAds()
    {
        $this->middleware('Auth');
        $id = Auth::id();
        $ads = User::find($id)->ads;
        return view('user.ads', compact('ads', $ads));
    }

    public function adScout()
    {

        if (!empty($_POST)) {
            var_dump($_POST);

            $filters = $_POST;

            $result = '<p>' . AdScout::find($filters) . '</p>';

            return $result;
        }


//        $city = 'Севастополь';
//        $price = 100;
//
//
//        $ads = Ad::query();
//
//        $ads->join('rooms', 'ads.room_id', '=', 'rooms.id');
//        $ads->join('places', 'rooms.place_id', '=', 'places.id');
//
//        $ads->where('places.city', '=', $city);
//        $ads->where('rooms.price', '>', $price);
//
//
//        return $ads->get();
    }
}
