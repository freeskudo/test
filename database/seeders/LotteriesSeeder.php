<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lottery;

class LotteriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Lottery::create([
            'name' => '2022年 サマージャンボ',
            'price' => 300,
            'slug' => 'summerJumbo' // camel case
        ]);

        Lottery::create([
            'name' => '2022年 サマージャンボ　ミニ',
            'price' => 300,
            'slug' => 'summerJumboMini'
        ]);

    }
}
