<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Addon;

class AddonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $addons = [
            ['addon_name'=>'Valet parking','price'=>1000],
            ['addon_name'=>'Birthday event','price'=>8000],
            ['addon_name'=>'Aniversay event','price'=>10000],
            ['addon_name'=>'Marriage event','price'=>25000],
            ['addon_name'=>'Gym and fitness','price'=>3000]
        ];

        foreach ($addons as $addon) {
            Addon::updateOrCreate(
                $addon,
                $addon
            );
        }
    }
}
