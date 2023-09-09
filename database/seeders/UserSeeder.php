<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => '田中太郎',
            'email' => 'tanaka@example.com',
            'password' => bcrypt('test')
        ]);

        User::create([
            'name' => '山田花子',
            'email' => 'yamada@example.com',
            'password' => bcrypt('test')
        ]);

    }
}
