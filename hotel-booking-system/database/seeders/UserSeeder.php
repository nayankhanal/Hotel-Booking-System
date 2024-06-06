<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email'=>'khanalnayan123@gmail.com'],
            [
                'name'=>'Nayan Khanal',
                'password'=>'Khanal@3720',
                'role'=>'admin',
            ]
        );
    }
}
