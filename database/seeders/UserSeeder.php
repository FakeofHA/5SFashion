<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 3; $i++)
            \App\Models\User::create([
                'name' => 'Nguyễn Hoàng Anh',
                'email' => 'hoanganh.1999021'.$i.'@outlook.com',
                'password' => bcrypt('zCaL5Vir'),
                'roleId' => $i + 1
            ]);
    }
}
