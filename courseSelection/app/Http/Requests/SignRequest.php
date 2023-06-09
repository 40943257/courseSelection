<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'account'       =>  'required|min:6|max:10|regex:/^[a-zA-Z0-9]+$/',
            'password'      =>  'required|min:6|max:10|regex:/^[a-zA-Z0-9]+$/',
            'email'         =>  'required|email',
            'name'          =>  'required|min:3|max:10',
            'permissions'   =>  'required|regex:/^[1-2]+$/'
        ];
    }
}
