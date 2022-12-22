<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commission;
use App\Http\Resources\CommissionResource;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

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

        $mailData = [
            'title' => 'You Have Mail, Tiger!',
            'body' => 'Contact Mail Sent'
        ];

        Mail::to('tiger@paddywackgifts.com')->send(new ContactMail($mailData));

        dd("Mail sent successfully");
    }

    public function update (Request $request, Commission $commission)
    {
        $request->validate([
            'name' => 'required|min:1|max:255',
            'email' => 'required',
            'size' => 'required',
            'shape' => 'required'
        ]);

        $commission->update($request->all());

        return $commission;
    }

    public function destroy (Commission $commission)
    {
        $commission->delete();

        return response()->noContent();
    }
}
