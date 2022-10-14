<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Join;
use App\Http\Resources\JoinResource;


class JoinController extends Controller
{
    public function index ()
    {
        $joins = Join::orderBy('id')->get();
        return JoinResource::collection($joins);
    }

    public function show (Join $join)
    {
        return new JoinResource($join);
    }

    protected function validateRequest ()
    {
        return request()->validate([
            'name' => 'required|min:1|max:255',
            'email' => 'required',
            'message' => 'required'
        ]);
    }

    public function store ()
    {
        $data = $this->validateRequest();

        $join = Join::create($data);

        return new JoinResource($join);
    }

    public function update (Request $request, Join $join)
    {
        $request()->validate([
            'name' => 'required|min:1|max:255',
            'email' => 'required',
            'message' => 'required'
        ]);

        $join->update($request->all());

        return $join;
    }

    public function destroy (Join $join)
    {
        $join->delete();

        return response()->noContent();
    }
}
