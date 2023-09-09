<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PurchaseDate;

class PurchaseDateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        PurchaseDate::create([
            'purchase_date' => '2022-07-05',
            'remarks' => '初日',
            'application_deadline' => '2022-07-01',
            'payment_deadline' => '2022-07-03',
            'shipment_date' => '2022-07-06'
        ]);

        PurchaseDate::create([
            'purchase_date' => '2022-07-10',
            'remarks' => '大安',
            'application_deadline' => '2022-07-05',
            'payment_deadline' => '2022-07-07',
            'shipment_date' => '2022-07-11'
        ]);

        PurchaseDate::create([
            'purchase_date' => '2022-07-16',
            'remarks' => '大安 & 一粒万倍日',
            'application_deadline' => '2022-07-11',
            'payment_deadline' => '2022-07-13',
            'shipment_date' => '2022-07-17'
        ]);

    }
}
