<?php

namespace App\Http\Requests\auth;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'username' => ['required', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => [
                'required',
            ],
            'passwordRepeat' => 'required|same:password',
        ];
    }



    public function messages(): array
    {
        return [
            'name.required' => __("validations.required"),
            'email.required' => __("validations.required"),
            'email.email' => __("validations.email_email"),
            'email.unique' => __("validations.email_unique"),
            'password.required' => __("validations.required"),
            'passwordRepeat.required' => __("validations.required"),
            'passwordRepeat.same' =>__("validations.pass_same"),
        ];
    }
}
