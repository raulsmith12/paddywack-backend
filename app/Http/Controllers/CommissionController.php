<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commission;
use App\Http\Resources\CommissionResource;


class CommissionController extends Controller
{
    public function index ()
    {
        $commissions = Commission::orderBy('id')->get();
        return CommissionResource::collection($commissions);
    }

    public function show (Commission $commission)
    {
        return new CommissionResource($commission);
    }

    protected function validateRequest ()
    {
        return request()->validate([
            'name' => 'required|min:1|max:255',
            'email' => 'required',
            'size' => 'required',
            'shape' => 'required'
        ]);
    }

    public function store ()
    {
        $data = $this->validateRequest();

        $commission = Commission::create($data);

        return new CommissionResource($commission);
    }

    public function update (Commission $commission)
    {
        $data = $this->validateRequest();

        $commission->update($data);

        return new CommissionResource($commission);
    }

    public function destroy (Commission $commission)
    {
        $commission->delete();

        return response()->noContent();
    }
}
