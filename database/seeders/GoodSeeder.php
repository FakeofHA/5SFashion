<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['Quần Bò Đen Trơn', 'Áo Phông Mạnh Mẽ', 'mũ lưỡi trai dolce'] as $name)
            for ($i = 0; $i < 6; $i++)
                for ($j = 0; $j < 2; $j++)
                    for ($k = 0; $k < 3; $k++)
                        \App\Models\Good::create([
                            'name' => $name,
                            'classifyId' => $i + 1,
                            'userId' => $j + 1,
                            'segmentId' => $k + 1
                        ]);
    }
}
