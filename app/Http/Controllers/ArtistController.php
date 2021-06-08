<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;

class ArtistController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }


    public function index(Artist $artist)
    {
        $artists = $artist->getList();
        return view('artist.list', compact('artists'));
    }


}
