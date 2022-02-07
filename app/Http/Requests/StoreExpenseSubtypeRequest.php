<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExpenseSubtypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => ["required", "max: 255", "string"],
//            "expense_type_id" => ["required", "exists:expense_types_id"]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Naziv je obavezno polje",
//            'expense_type_id.required' => "Tip troška je obavezno polje"
        ];
    }
}
