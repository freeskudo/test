<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(UserSeeder::class);
        $this->call(OptinSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(PointSeeder::class);
        $this->call(LotteriesSeeder::class);
        $this->call(PurchaseDateSeeder::class);
        $this->call(PurchaseWindowSeeder::class);
    }
}
