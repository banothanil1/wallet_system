<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use  App\Http\Controllers\usercontroller;

class validation extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'phno' => 'required|digits:10',
            'password' => 'required',
            'Balence' => 'required|numeric', // Accepts integer or decimal values
        ];
    }
    

    public function messages(): array
    {
        return [
            'name.required' => 'name is required',
            'email.required'=>'email is required',
            'phno.required'=>'phno is required',
            'password.required'=>'password is required ',
            'Balence.required'=>'Please Enter Balence',
        ];
    }
}
