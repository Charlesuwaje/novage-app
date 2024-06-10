<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrRequest extends FormRequest
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
            "email" => "required|email|unique:users,email|in:yahoo,gmail",
            "name" => "required|string|max:255 " ,
            "phone_number" => "required|string|max:255",
            
        ];
        
    }
    public function messages()
    {
        return [
            'email.in' => 'please this accepts only email format of gmail and yahoo mails thanks.',
        ];
    }
}
