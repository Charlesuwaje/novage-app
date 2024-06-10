<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NovageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'phone_number' => 'required|digits:11',
            'mobile_network' => 'required|string|in:MTN,Airtel,9mobile,Glo',
            'message' => 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'mobile_network.in' => 'The mobile network must be one of the following: MTN, Airtel, 9mobile, or Glo.',
        ];
    }
}
