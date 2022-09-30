<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Http\Resources\GalleryResource;


class GalleryController extends Controller
{
    public function index ()
    {
        $gallerys = Gallery::orderBy('id')->get();
        return GalleryResource::collection($gallerys);
    }

    public function show (Gallery $gallery)
    {
        return new GalleryResource($gallery);
    }

    protected function validateRequest ()
    {
        return request()->validate([
            'image_url' => 'required|min:1|max:255',
            'description' => 'required'
        ]);
    }

    public function store ()
    {
        $data = $this->validateRequest();

        $gallery = Gallery::create($data);

        return new GalleryResource($gallery);
    }

    public function update (Gallery $gallery)
    {
        $data = $this->validateRequest();

        $gallery->update($data);

        return new GalleryResource($gallery);
    }

    public function destroy (Gallery $gallery)
    {
        $gallery->delete();

        return response()->noContent();
    }
}
