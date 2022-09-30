<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;
use App\Http\Resources\PrivacyPolicyResource;


class PrivacyPolicyController extends Controller
{
    public function index ()
    {
        $privacy_policys = PrivacyPolicy::orderBy('id')->get();
        return PrivacyPolicyResource::collection($privacy_policys);
    }

    public function show (PrivacyPolicy $privacy_policy)
    {
        return new PrivacyPolicyResource($privacy_policy);
    }

    protected function validateRequest ()
    {
        return request()->validate([
            'title' => 'required|min:1|max:255',
            'page_content' => 'required'
        ]);
    }

    public function store ()
    {
        $data = $this->validateRequest();

        $privacy_policy = PrivacyPolicy::create($data);

        return new PrivacyPolicyResource($privacy_policy);
    }

    public function update (PrivacyPolicy $privacy_policy)
    {
        $data = $this->validateRequest();

        $privacy_policy->update($data);

        return new PrivacyPolicyResource($privacy_policy);
    }

    public function destroy (PrivacyPolicy $privacy_policy)
    {
        $privacy_policy->delete();

        return response()->noContent();
    }
}
