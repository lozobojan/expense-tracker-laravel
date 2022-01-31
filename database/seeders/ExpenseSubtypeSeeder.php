<?php

namespace Database\Seeders;

use App\Models\ExpenseSubtype;
use Illuminate\Database\Seeder;

class ExpenseSubtypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subtypes = [
            ["expense_type_id" => 2, "name" => "Računi za struju"],
            ["expense_type_id" => 2, "name" => "Računi za vodu"],
            ["expense_type_id" => 2, "name" => "Računi za telefon"],
        ];

        foreach ($subtypes as $subtype) {
            ExpenseSubtype::query()->create($subtype);
        }
    }
}
