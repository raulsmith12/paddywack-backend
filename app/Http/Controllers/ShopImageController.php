<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShopImage;
use App\Http\Resources\ShopImageResource;


class ShopImageController extends Controller
{
    public function index ()
    {
        $shop_images = ShopImage::orderBy('id')->get();
        return ShopImageResource::collection($shop_images);
    }

    public function show (ShopImage $shop_image)
    {
        return new ShopImageResource($shop_image);
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

        $shop_image = ShopImage::create($data);

        return new ShopImageResource($shop_image);
    }

    public function update (Request $request, ShopImage $shop_image)
    {
        $request->validate([
            'image_url' => 'required'
        ]);

        $shop_image->update($request->all());

        return $shop_image;
    }

    public function destroy (ShopImage $shop_image)
    {
        $shop_image->delete();

        return response()->noContent();
    }
}
