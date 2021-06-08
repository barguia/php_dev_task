<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Album extends Model
{
    use HasFactory;

    protected $table = "albums";
    public $fillable = array(

    );

    protected function list()
    {
        $albums = self::all();
        return view('album.list', compact('albums'));
    }

    protected function updateAlbum($request): void
    {
        $this->artist = $request->artist;
        $this->album = $request->album;
        $this->year = $request->year;
        $this->update();
        session()->flash('message','User created successfully.');
        session()->flash('style','success');
    }

    protected function form()
    {
        return view('album.form');
    }

    protected function show($disabled = 'disabled')
    {
        $album = $this;
        return view('album.show', compact('album', 'disabled'));
    }
}
