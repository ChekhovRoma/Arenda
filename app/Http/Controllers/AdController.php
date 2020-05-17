<?php

namespace App\Http\Controllers;

use App\User;
use App\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdController extends Controller
{
    public function getAllAds () {
        $ads = Ad::paginate(2);
        return view('welcome', compact('ads', $ads));
    }

    public function getUserAds () {
        $this->middleware('Auth');
        $id = Auth::id();
        $ads = User::find($id)->ads;
        return view('user.ads', compact('ads', $ads));
    }
}
