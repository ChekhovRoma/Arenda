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
    public function getAd($id)
    {
        $ad = Ad::where(['id' => $id])->first();
        $placeTypes = PlaceType::all();

        return view('ad', compact(
            [
                'placeTypes', $placeTypes,
                'ad', $ad,
            ]));
    }

    public function getAllAds(Request $request)
    {
            $filters = $request->all();

            $ads = AdScout::find($filters)->paginate(3);



        $placeTypes = PlaceType::all();

        return view('welcome', compact(
            ['placeTypes', $placeTypes,
                'ads', $ads,
            ]));
    }

    public function filterAds()
    {
        $filters = $_POST;

        return redirect()->route('main', [
            'city' => $filters['city'],
            'name' => $filters['name'],
            'placeType' => $filters['placeType'],
            'minPrice' => $filters['minPrice'],
            'maxPrice' => $filters['maxPrice'],
            'orderBy' => $filters['orderBy']
        ]);
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
            $filters = $_POST;
            return AdScout::find($filters);
        }
    }
}
