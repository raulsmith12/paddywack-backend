<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactEmailController extends Controller
{
    public function index(Request $request)
    {
        $mailData = [
            'title' => 'Somebody Wants to Contact You, Tiger!',
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone_no' => $request->get('phone_no'),
            'message' => $request->get('message')
        ];

        Mail::to('raul@galacticdigitalstudios.com')->send(new ContactMail($mailData));
    }
}
