<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Http\Resources\ShopResource;


class ShopController extends Controller
{
    public function index ()
    {
        $shops = Shop::orderBy('id')->get();
        return ShopResource::collection($shops);
    }

    public function show (Shop $shop)
    {
        return new ShopResource($shop);
    }

    protected function validateRequest ()
    {
        return request()->validate([
            'name' => 'required|min:1|max:255',
            'description' => 'required',
            'price' => 'required',
            'paypal_id' => 'required'
        ]);
    }

    public function store ()
    {
        $data = $this->validateRequest();

        $shop = Shop::create($data);

        return new ShopResource($shop);
    }

    public function update (Request $request, Shop $shop)
    {
        $request->validate([
            'name' => 'required|min:1|max:255',
            'description' => 'required',
            'price' => 'required',
            'paypal_id' => 'required'
        ]);

        $shop->update($request->all());

        return $shop;
    }

    public function destroy (Shop $shop)
    {
        $shop->delete();

        return response()->noContent();
    }
}
