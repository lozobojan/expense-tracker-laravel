<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExpenseSubtypeRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "name" => ["required", "min:2", "max:255", "string"],
            "expense_type_id" => ["required", "integer", "exists:expense_types,id"]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Name is required.",
            'name.min' => "Name must be at least :min characters long.",
            'name.max' => "Name can have up to :max characters.",
            'name.string' => "Name must be text.",

            'expense_type_id.required' => "Expense type is required.",
            'expense_type_id.integer' => "Expense type ID must be integer.",
            'expense_type_id.exists' => "Expense type doesn't exist.",
        ];
    }
}
