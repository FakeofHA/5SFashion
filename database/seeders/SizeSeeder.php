<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Size::create([
			'name' => 'S'
		]);

        \App\Models\Size::create([
			'name' => 'M'
		]);

        \App\Models\Size::create([
			'name' => 'L'
		]);

        \App\Models\Size::create([
			'name' => 'XL'
		]);

        \App\Models\Size::create([
			'name' => 'XXL'
		]);

        \App\Models\Size::create([
			'name' => 'XXXL'
		]);

        \App\Models\Size::create([
			'name' => 'Free Size'
		]);
    }
}
