<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Optin;

class OptinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Optin::create([
            'user_id' => 1,
            'optin' => true
        ]);

        Optin::create([
            'user_id' => 2,
            'optin' => false
        ]);

    }
}
