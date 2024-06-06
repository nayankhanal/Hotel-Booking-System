<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\RoomClass;

class RoomClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = [
            ['class'=>'Deluxe','base_price'=>7000],
            ['class'=>'Standard','base_price'=>12000],
            ['class'=>'Premium','base_price'=>18000],
            ['class'=>'Presidential','base_price'=>30000]
        ];

        foreach ($classes as $class) {
            RoomClass::updateOrCreate(
                ['class'=>$class['class']],
                $class
            );
        }
    }
}
