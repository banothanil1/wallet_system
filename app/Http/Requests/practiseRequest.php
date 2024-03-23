<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class practiseRequest extends FormRequest
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
    public static function rules(): array
    {
        return [
            'name'=>'required',
            'college'=>'required',
            'contact'=>'required',
            'state'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'you need to enter name',
            'college.required'=>'you need to enter college name',
            'contact.required'=>'you need to enter contact',
            'state.required'=>'you need to enter state',
        ];
    }

    
}
