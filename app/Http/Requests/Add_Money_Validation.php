<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Add_Money_Validation extends FormRequest
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
            'amount'=>'required|numeric|gt:0'
        ];
        
    }

    public function messages(): array
{
    return [
        'amount.required' => 'please enter amount',
    ];
}
}
