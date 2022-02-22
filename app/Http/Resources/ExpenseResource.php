<?php

namespace App\Http\Resources;

use App\Models\Expense;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ExpenseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "amount" => number_format($this->amount, 2),
            "date" => Carbon::parse($this->date)->format(Expense::DATE_FORMAT),
            "type" => new ExpenseTypeResource($this->type)
        ];
    }
}
