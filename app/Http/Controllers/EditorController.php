<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\Finder\Exception\AccessDeniedException;

class EditorController extends Controller
{
    public function index($id)
    {
        $place = Place::find($id);
        if (!$place || $place->user->id != Auth::id()) {
            abort(403, 'Access denied');
        }
        $schema = $place->schema;
        return view('editor', compact(['schema', 'id']));
    }
}
