<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use App\Http\Resources\ArtistResource;


class ArtistController extends Controller
{
    public function index ()
    {
        $artists = Artist::orderBy('id')->get();
        return ArtistResource::collection($artists);
    }

    public function show (Artist $artist)
    {
        return new ArtistResource($artist);
    }

    protected function validateRequest ()
    {
        return request()->validate([
            'name' => 'required|min:1|max:255',
            'description' => 'required'
        ]);
    }

    public function store ()
    {
        $data = $this->validateRequest();

        $artist = Artist::create($data);

        return new ArtistResource($artist);
    }

    public function update (Request $request, Artist $artist)
    {
        $request()->validate([
            'name' => 'required|min:1|max:255',
            'description' => 'required'
        ]);

        $artist->update($request->all());

        return $artist;
    }

    public function destroy (Artist $artist)
    {
        $artist->delete();

        return response()->noContent();
    }
}
