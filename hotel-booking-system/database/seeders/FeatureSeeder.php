<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Feature;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            'Coffee Machine',
            'Air Conditioning',
            'Free Wifi',
            'Swimming Pool',
            'Snooker',
            'Luxurious Bath Amenities',
            'Personalized Butler Service',
            'Private Dining',
            'Spa Facilitie',
            'Entertainment System',
        ];

        foreach ($features as $feature) {
            Feature::updateOrCreate(
                ['feature'=>$feature],
                ['feature'=>$feature]
            );
        }
    }
}
