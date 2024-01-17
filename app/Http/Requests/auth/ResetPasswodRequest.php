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
                // 'min:8',
                // 'regex:/^(?=.*[A-Z])(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]+$/',
            ],
            'repassword' => 'required|same:password',
        ];
    }



    public function messages(): array
    {
        return [
            'password.required' => 'Şifrə sahəsi mütləqdir.',
            'password.min' => 'Şifrə minimum 8 simvol olmalıdır.',
            'password.regex' => 'Şifrədə minimum bir böyük hərf və bir simvol olmalıdır.',
            'repassword.required' => 'Təsdiq şifrəsi sahəsi mütləqdir.',
            'repassword.same' => 'Təsdiq şifrəsi şifrə ilə uyğun gəlmir.',
        ];
    }
}
