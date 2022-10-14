<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeSection;
use App\Http\Resources\HomeSectionResource;


class HomeSectionController extends Controller
{
    public function index ()
    {
        $home_sections = HomeSection::orderBy('id')->get();
        return HomeSectionResource::collection($home_sections);
    }

    public function show (HomeSection $home_section)
    {
        return new HomeSectionResource($home_section);
    }

    protected function validateRequest ()
    {
        return request()->validate([
            'title' => 'required|min:1|max:255',
            'description' => 'required',
            'link_url' => 'required',
            'icon_url' => 'required'
        ]);
    }

    public function store ()
    {
        $data = $this->validateRequest();

        $home_section = HomeSection::create($data);

        return new HomeSectionResource($home_section);
    }

    public function update (Request $request, HomeSection $home_section)
    {
        $request()->validate([
            'title' => 'required|min:1|max:255',
            'description' => 'required',
            'link_url' => 'required',
            'icon_url' => 'required'
        ]);

        $home_section->update($request->all());

        return $home_section;
    }

    public function destroy (HomeSection $home_section)
    {
        $home_section->delete();

        return response()->noContent();
    }
}
