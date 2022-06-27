<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 252; $i++)
            \App\Models\Cart::create([
                'price' => 240000,
                'paid' => false,
                'userId' => 3
            ]);
    }
}
