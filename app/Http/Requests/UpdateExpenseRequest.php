<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExpenseRequest extends FormRequest
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
            "amount" => ["nullable","numeric", "min:1"],
            "date" => ["nullable","date"],
            "expense_type_id" => ["nullable", "exists:expense_types,id"],
            "expense_subtype_id" => ["nullable", "exists:expense_subtypes,id"],
        ];
    }

    public function messages()
    {
        return [
            "amount.required" => "Iznos je obavezno polje",
            "amount.number" => "Iznos mora biti broj",
            "amount.min" => "Minimalni iznos je :min"
        ];
    }
}
