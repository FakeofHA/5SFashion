<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClassifySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['quần', 'áo', 'mũ'] as $name)
            foreach (['nam', 'nữ'] as $sex)
                \App\Models\Classify::create([
                    'name' => $name,
                    'sex' => $sex
                ]);
    }
}
