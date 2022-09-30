<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JoinPage;
use App\Http\Resources\JoinPageResource;


class JoinPageController extends Controller
{
    public function index ()
    {
        $join_pages = JoinPage::orderBy('id')->get();
        return JoinPageResource::collection($join_pages);
    }

    public function show (JoinPage $join_page)
    {
        return new JoinPageResource($join_page);
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

        $join_page = JoinPage::create($data);

        return new JoinPageResource($join_page);
    }

    public function update (JoinPage $join_page)
    {
        $data = $this->validateRequest();

        $join_page->update($data);

        return new JoinPageResource($join_page);
    }

    public function destroy (JoinPage $join_page)
    {
        $join_page->delete();

        return response()->noContent();
    }
}
