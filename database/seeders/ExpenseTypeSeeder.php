<?php

namespace Database\Seeders;

use App\Models\ExpenseType;
use Illuminate\Database\Seeder;

class ExpenseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ["id" => 1, "name" => "Gorivo", "color" => "#47D900" ],
            ["id" => 2, "name" => "Računi", "color" => "#FFCE56" ],
            ["id" => 3, "name" => "Obrazovanje", "color" => "#36A2EB" ]
        ];

        foreach ($types as $type) {
            ExpenseType::query()->create($type);
        }
    }
}
