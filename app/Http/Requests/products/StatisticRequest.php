<?php

namespace App\Http\Requests\products;

use Illuminate\Foundation\Http\FormRequest;

class StatisticRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        $rules = [];
        $rules["point_of_sale_id"] = 'required';
        $rules["time"] = 'required';

        $rules["price"] = 'required';
        return $rules;
    }

    public function messages()
    {

   
        $customMessages["point_of_sale_id.required"] = __("validations.required");
        $customMessages["price.required"] = __("validations.required");
        $customMessages["time.required"] = __("validations.required");


        return $customMessages;
    }
}
