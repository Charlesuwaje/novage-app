<?php

namespace App\Http\Controllers;

use App\Models\Novage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class NovageController extends Controller
{
    // public function create(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'phone_number' => 'required|digits:11',
    //         'mobile_network' => 'required|string|in:mtn,airtel,9mobile,glo',
    //         'message' => 'required|string',
    //         'ref_code' => 'required|string|unique:registrations,ref_code',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'phone_number' => $request->phone_number,
    //             'mobile_network' => $request->mobile_network,
    //             'status' => 'failure',
    //             'message' => $validator->errors()->first(),
    //         ], 422);
    //     }

    //     Novage::create($request->all());

    //     return response()->json([
    //         'phone_number' => $request->phone_number,
    //         'mobile_network' => $request->mobile_network,
    //         'status' => 'success',
    //         'message' => 'Registration successful',
    //     ], 201);
    // }


    public function create(Request $request)
{
    $validator = Validator::make($request->all(), [
        'phone_number' => 'required|digits:11',
        'mobile_network' => 'required|string|in:MTN,Airtel,9mobile,Glo',
        'message' => 'required|string',
        'mobile_network.in' => 'The mobile network must be one of the following: MTN, Airtel, 9mobile, or Glo.',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'phone_number' => $request->phone_number,
            'mobile_network' => $request->mobile_network,
            'status' => 'failure',
            'message' => $validator->errors()->first(),
        ], 422);
    }

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
