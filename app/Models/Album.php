<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Models\Artist;

class Album extends Model
{
    use HasFactory;

    protected $table = "albums";
    public $fillable = array(
        "artist",
        "album",
        "year",
        "user_id",
    );


    # Relationships
    public function registeredBy()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

    public function newAlbum($request): self
    {
        return self::create(array_merge($request, [
            "user_id" => Auth::user()->id
        ]));
    }

    public function destroyAlbum()
    {
        $id = $this->id;
        $this->delete();
        if(!self::find($id)) {
            session()->flash('message','Album destroyed successfully.');
            session()->flash('style','success');
            return;
        }

        session()->flash('message','Something wrong happened.');
        session()->flash('style','danger');
    }

    private function getDataToForm(): array
    {
        $artist = new Artist();
        $artists = $artist->getList();
        return compact('artists');
    }

    public function list()
    {
        $albums = self::all();
        return view('album.list', compact('albums'));
    }

    public function updateAlbum($request): void
    {
        $this->artist = $request->artist;
        $this->album = $request->album;
        $this->year = $request->year;
        $this->update();
        session()->flash('message','Album updated successfully.');
        session()->flash('style','success');
    }

    public function form()
    {
        return view('album.form', $this->getDataToForm());
    }

    public function show()
    {
        $album = $this;
        return view('album.show', array_merge(
            $this->getDataToForm(),
            compact('album')
        ));
    }
}
