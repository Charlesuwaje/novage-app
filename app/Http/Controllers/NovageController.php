<?php

namespace App\Http\Controllers;

use App\Http\Requests\NovageRequest;
use App\Models\Novage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class NovageController extends Controller
{
    public function create(NovageRequest $request)
{
    $ref_code = $this->generateUniqueRefCode();

    Novage::create([
        'phone_number' => $request->phone_number,
        'mobile_network' => $request->mobile_network,
        'message' => $request->message,
        'ref_code' => $ref_code,
    ]);

    return response()->json([
        'phone_number' => $request->phone_number,
        'mobile_network' => $request->mobile_network,
        'status' => 'success',
        'message' => 'Registration successful',
        'ref_code' => $ref_code,
    ], 201);
}
private function generateUniqueRefCode()
{
    do {
        // Generate a random reference code
        $ref_code = Str::random(10);
    } while (Novage::where('ref_code', $ref_code)->exists());

    return $ref_code;
}
}
