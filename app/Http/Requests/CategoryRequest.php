<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{

    public function rules()
    {
        return [
            "name" => "required"
        ];
    }
    public function messages()
    {
        return [
            "name.required" => "Categoty Name is required"
        ];
    }
}
