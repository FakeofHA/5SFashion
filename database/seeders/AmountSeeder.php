<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AmountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 7; $i++)
            for ($j = 0; $j < 36; $j++)
                \App\Models\Amount::create([
                    'volume' => 10,
                    'sizeId' => $i + 1,
                    'goodId' => $j + 1
                ]);
    }
}
