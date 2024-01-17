<?php

namespace App\Http\Requests\auth;


use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ResetPasswodRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [

            'password' => [
                'required',
            ],
            'repassword' => 'required|same:password',
        ];
    }



    public function messages(): array
    {
        return [
            'password.required' => __("validations.required"),
            'repassword.required' => __("validations.required"),
            'repassword.same' => __("validations.pass_same"),
        ];
    }
}
