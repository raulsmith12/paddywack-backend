<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactPage;
use App\Http\Resources\ContactPageResource;


class ContactPageController extends Controller
{
    public function index ()
    {
        $contact_pages = ContactPage::orderBy('id')->get();
        return ContactPageResource::collection($contact_pages);
    }

    public function show (ContactPage $contact_page)
    {
        return new ContactPageResource($contact_page);
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

        $contact_page = ContactPage::create($data);

        return new ContactPageResource($contact_page);
    }

    public function update (ContactPage $contact_page)
    {
        $data = $this->validateRequest();

        $contact_page->update($data);

        return new ContactPageResource($contact_page);
    }

    public function destroy (ContactPage $contact_page)
    {
        $contact_page->delete();

        return response()->noContent();
    }
}
