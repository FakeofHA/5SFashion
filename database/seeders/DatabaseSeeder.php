<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SegmentSeeder::class);
        $this->call(ClassifySeeder::class);
        $this->call(SizeSeeder::class);
        $this->call(GoodSeeder::class);
        $this->call(AmountSeeder::class);
        $this->call(MarginSeeder::class);
        $this->call(CartSeeder::class);
        $this->call(CheckerSeeder::class);
    }
}
