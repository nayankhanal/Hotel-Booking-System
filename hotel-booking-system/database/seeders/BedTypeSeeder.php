<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\BedType;

class BedTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bed_types = ['Single','Double','Queen','King'];

        foreach ($bed_types as $bed_type) {
            BedType::updateOrCreate(
                ['bed_type'=>$bed_type],
                ['bed_type'=>$bed_type]
            );
        }
    }
}
