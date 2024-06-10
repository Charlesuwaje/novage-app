<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrRequest;
use App\Models\Registration;
use App\Notifications\RegistrationConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    // this is api endpoint.
    public function store(RegistrRequest $request)
    {
        $registration = Registration::create($request->all());

        $registration->notify(new RegistrationConfirmation($registration));


        return response()->json(['success', 'Registration successful! A confirmation email has been sent.'], 200);
    }

    public function showForm()
    {
        return view('register');
    }
// this part is for web using blade  i had to do this because i was confused with what u guys want here if its just api or web so i did both for web and api for this module hope you understand.
    public function storeForm(RegistrRequest $request)
    {
        $registration = Registration::create($request->all());

        $registration->notify(new RegistrationConfirmation($registration));

        return redirect()->back()->with('success', 'Registration successful! A confirmation email has been sent.',200);
    }
}
