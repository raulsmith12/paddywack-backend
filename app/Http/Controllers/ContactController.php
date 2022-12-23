<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Resources\ContactResource;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index ()
    {
        $contacts = Contact::orderBy('id')->get();
        return ContactResource::collection($contacts);
    }

    public function show (Contact $contact)
    {
        return new ContactResource($contact);
    }

    protected function validateRequest ()
    {
        return request()->validate([
            'name' => 'required|min:1|max:255',
            'email' => 'required',
            'message' => 'required',
            'phone_no' => 'sometimes'
        ]);
    }

    public function store ()
    {
        $data = $this->validateRequest();

        $contact = Contact::create($data);

        Mail::to('tiger@paddywackgifts.com')->send(new ContactMail($data));

        return new ContactResource($contact);
    }

    public function update (Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required|min:1|max:255',
            'email' => 'required',
            'message' => 'required'
        ]);

        $contact->update($request->all());

        return $contact;
    }

    public function destroy (Contact $contact)
    {
        $contact->delete();

        return response()->noContent();
    }
}
