<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrRequest;
use App\Models\Registration;
use App\Notifications\RegistrationConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    public function store(RegistrRequest $request)
    {
        $registration = Registration::create($request->all());

        $registration->notify(new RegistrationConfirmation($registration));


        return response()->json(['success', 'Registration successful! A confirmation email has been sent.'], 200);
    }
}
