<?php

namespace App\Http\Requests\points_of_sales;

use Illuminate\Foundation\Http\FormRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class PointsOfSalesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        $supportedLanguages = LaravelLocalization::getSupportedLanguagesKeys();
        $rules = [];
        foreach ($supportedLanguages as $lang) {
            $rules["name.$lang"] = 'required|';
        }
        return $rules;
    }

    public function messages()
    {
        $supportedLanguages = LaravelLocalization::getSupportedLanguagesKeys();

        $customMessages = [];

        foreach ($supportedLanguages as $lang) {
            $customMessages["name.$lang.required"] = __("validations.required");
        }
        return $customMessages;
    }
}
