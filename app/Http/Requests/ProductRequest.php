<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    public function rules()
    {
        return [
            "name" => "required",
            "categories_id" => "required",
            'tags_id' => 'required'
        
        ];
    }
    public function messages()
    {
        return [
            "name.required" => "Categoty Name is Required",
            "categories_id" => "Category Name is Required",
            "tags_id" => "Tag Name is Required"
        ];
    }
}
