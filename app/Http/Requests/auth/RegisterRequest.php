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
                // 'min:8',
                // 'regex:/^(?=.*[A-Z])(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]+$/',
            ],
            'passwordRepeat' => 'required|same:password',
        ];
    }



    public function messages(): array
    {
        return [
            'name.required' => 'Ad sahəsi mütləqdir.',
            'email.required' => 'E-poçt ünvanı mütləqdir.',
            'email.email' => 'Düzgün e-poçt ünvanı daxil edin.',
            'email.unique' => 'Bu e-poçt ünvanı artıq qeydiyyatdan keçib.',
            'password.required' => 'Şifrə sahəsi mütləqdir.',
            'password.min' => 'Şifrə minimum 8 simvol olmalıdır.',
            'password.regex' => 'Şifrədə minimum bir böyük hərf və bir simvol olmalıdır.',
            'passwordRepeat.required' => 'Təsdiq şifrəsi sahəsi mütləqdir.',
            'passwordRepeat.same' => 'Təsdiq şifrəsi şifrə ilə uyğun gəlmir.',
        ];
    }
}
