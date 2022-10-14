<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Http\Resources\AboutResource;


class AboutController extends Controller
{
    public function index ()
    {
        $abouts = About::orderBy('id')->get();
        return AboutResource::collection($abouts);
    }

    public function show (About $about)
    {
        return new AboutResource($about);
    }

    protected function validateRequest ()
    {
        return request()->validate([
            'title' => 'required|min:1|max:255',
            'description' => 'required'
        ]);
    }

    public function store ()
    {
        $data = $this->validateRequest();

        $about = About::create($data);

        return new AboutResource($about);
    }

    public function update (Request $request, About $about)
    {
        $request()->validate([
            'title' => 'required|min:1|max:255',
            'description' => 'required'
        ]);

        $about->update($request->all());

        return $about;
    }

    public function destroy (About $about)
    {
        $about->delete();

        return response()->noContent();
    }
}
