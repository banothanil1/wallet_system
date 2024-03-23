<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Transfer_Money_validation extends FormRequest
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
            'amount'=>'required|numeric|gt:0',
            'recipientName'=>'required',
            'recipientPassword'=>'required',
        ];
    }

    public function messages(): array
    {
        return [
            'amount.required' => 'please enter amount',
            'recipientName.required'=>'enter recipient name',
            'recipientPassword.required'=>'enter password',
        ];
    }
}
