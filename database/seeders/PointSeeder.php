<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Point;

class PointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Point::create([
            'user_id' => 1,
            'point' => 1000,
            'deadline' => '2022-10-01',
            'validity' => true
        ]);

        Point::create([
            'user_id' => 2,
            'point' => 2000,
            'deadline' => '2022-10-01',
            'validity' => true
        ]);

    }
}
