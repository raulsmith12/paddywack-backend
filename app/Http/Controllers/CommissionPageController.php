<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommissionPage;
use App\Http\Resources\CommissionPageResource;


class CommissionPageController extends Controller
{
    public function index ()
    {
        $commission_pages = CommissionPage::orderBy('id')->get();
        return CommissionPageResource::collection($commission_pages);
    }

    public function show (CommissionPage $commission_page)
    {
        return new CommissionPageResource($commission_page);
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

        $commission_page = CommissionPage::create($data);

        return new CommissionPageResource($commission_page);
    }

    public function update (CommissionPage $commission_page)
    {
        $data = $this->validateRequest();

        $commission_page->update($data);

        return new CommissionPageResource($commission_page);
    }

    public function destroy (CommissionPage $commission_page)
    {
        $commission_page->delete();

        return response()->noContent();
    }
}
