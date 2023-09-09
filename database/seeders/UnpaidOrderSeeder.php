<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnpaidOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Order::create([
            'lottery_id' => 1,
        ]);

        Order::create([
            'lottery_id' => 2,
        ]);

    }
}