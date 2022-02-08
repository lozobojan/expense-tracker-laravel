<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExpenseTypeRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "name" => ["required", "min:2", "max:255", "string"],
            "color" => ["required", "min:7", "max:9", "string"]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Name is required.",
            'name.min' => "Name must be at least :min characters long.",
            'name.max' => "Name can have up to :max characters.",
            'name.string' => "Name must be text.",

            'color.required' => "Color is required.",
            'color.min' => "Color must be at least :min characters long.",
            'color.max' => "Color can have up to :max characters.",
            'color.string' => "Color must be text."
        ];
    }
}
