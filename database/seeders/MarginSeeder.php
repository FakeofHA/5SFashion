<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MarginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 252; $i++)
            \App\Models\Margin::create([
                'cost' => 80000,
                'price' => 120000,
                'volume' => 0,
                'status' => true,
                'amountId' => $i + 1
            ]);
    }
}
