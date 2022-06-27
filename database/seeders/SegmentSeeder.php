<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SegmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Segment::create([
			'name' => 'Bình Dân'
		]);

        \App\Models\Segment::create([
			'name' => 'Trung Bình'
		]);

        \App\Models\Segment::create([
			'name' => 'Cao Cấp'
		]);
    }
}
