<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CheckerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 0;
        for ($j = 0; $j < 7; $j++)
            for ($k = 0; $k < 36; $k++) {
                \App\Models\Checker::create([
                    'amount' => 2,
                    'cartId' => $i + 1,
                    'sizeId' => $j + 1,
                    'goodId' => $k + 1
                ]);
                $i++;
            }
    }
}
