<?php

namespace App\Http\Requests\products;

use Illuminate\Foundation\Http\FormRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CreateProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        $supportedLanguages = LaravelLocalization::getSupportedLanguagesKeys();
        $rules = [];
        $rules["image"] = 'required';
        $rules["barcode"] = 'required';

        foreach ($supportedLanguages as $lang) {
            $rules["name.$lang"] = 'required';
            $rules["desc.$lang"] = 'required';
            $rules["info.$lang"] = 'required';
        }
        return $rules;
    }

    public function messages()
    {
        $supportedLanguages = LaravelLocalization::getSupportedLanguagesKeys();

        $customMessages = [];

        foreach ($supportedLanguages as $lang) {
            $customMessages["name.$lang.required"] = __("validations.required");
            $customMessages["desc.$lang.required"] = __("validations.required");
            $customMessages["info.$lang.required"] = __("validations.required");
        }
        $customMessages["image.required"] = __("validations.required");
        $customMessages["barcode.required"] = __("validations.required");
        return $customMessages;
    }
}
