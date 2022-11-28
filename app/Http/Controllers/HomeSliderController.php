<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeSlider;
use App\Http\Resources\HomeSliderResource;


class HomeSliderController extends Controller
{
    public function index ()
    {
        $home_sliders = HomeSlider::orderBy('id')->get();
        return HomeSliderResource::collection($home_sliders);
    }

    public function show (HomeSlider $home_slider)
    {
        return new HomeSliderResource($home_slider);
    }

    protected function validateRequest ()
    {
        return request()->validate([
            'image_url' => 'required'
        ]);
    }

    public function store ()
    {
        $data = $this->validateRequest();

        $home_slider = HomeSlider::create($data);

        return new HomeSliderResource($home_slider);
    }

    public function update (Request $request, HomeSlider $home_slider)
    {
        $request->validate([
            'image_url' => 'required'
        ]);

        $home_slider->update($request->all());

        return $home_slider;
    }

    public function destroy (HomeSlider $home_slider)
    {
        $home_slider->delete();

        return response()->noContent();
    }
}
