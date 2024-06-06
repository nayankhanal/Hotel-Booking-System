<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\RoomClass;
use App\Models\Feature;
use App\Models\RoomClassFeature;

class RoomClassFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $room_classes = RoomClass::all();
        $features = Feature::all();

        $features_ids = [];
        foreach ($features as $feature) {
            $f_id = match ($feature->feature) {
                'Coffee Machine' => ['coffee_machine_feature_id'=>$feature->id],
                'Air Conditioning' => ['air_conditioning_feature_id'=>$feature->id],
                'Free Wifi' => ['free_wifi_feature_id'=>$feature->id],
                'Swimming Pool' => ['swimming_pool_feature_id'=>$feature->id],
                'Snooker' => ['snooker_feature_id'=>$feature->id],
                'Luxurious Bath Amenities' => ['luxurious_bath_amenities_feature_id'=>$feature->id],
                'Personalized Butler Service' => ['personalized_bulter_feature_id'=>$feature->id],
                'Private Dining' => ['private_dining_feature_id'=>$feature->id],
                'Spa Facilitie' => ['spa_facilitie_feature_id'=>$feature->id],
                'Entertainment System' => ['entertainment_feature_id'=>$feature->id],
            };
            $features_ids[] = $f_id;
        }
        // print_r($features_ids);

        $actual_features_ids = [];
        foreach ($features_ids as $feature_id) {
            $actual_features_ids = $actual_features_ids + $feature_id;
        }
        // print_r($actual_features_ids);

        $room_class_features = [];

        foreach ($room_classes as $room_class) {
            if($room_class->class === 'Deluxe'){
                $room_class_features[] = ['room_class_id'=>$room_class->id ,'feature_id'=>$actual_features_ids['air_conditioning_feature_id']];
                $room_class_features[] = ['room_class_id'=>$room_class->id ,'feature_id'=>$actual_features_ids['free_wifi_feature_id']];
                $room_class_features[] = ['room_class_id'=>$room_class->id ,'feature_id'=>$actual_features_ids['entertainment_feature_id']];
            }elseif ($room_class->class === 'Standard') {
                $room_class_features[] = ['room_class_id'=>$room_class->id ,'feature_id'=>$actual_features_ids['air_conditioning_feature_id']];
                $room_class_features[] = ['room_class_id'=>$room_class->id ,'feature_id'=>$actual_features_ids['free_wifi_feature_id']];
                $room_class_features[] = ['room_class_id'=>$room_class->id ,'feature_id'=>$actual_features_ids['entertainment_feature_id']];
                $room_class_features[] = ['room_class_id'=>$room_class->id ,'feature_id'=>$actual_features_ids['snooker_feature_id']];
                $room_class_features[] = ['room_class_id'=>$room_class->id ,'feature_id'=>$actual_features_ids['coffee_machine_feature_id']];
            }elseif ($room_class->class === 'Premium') {
                $room_class_features[] = ['room_class_id'=>$room_class->id ,'feature_id'=>$actual_features_ids['air_conditioning_feature_id']];
                $room_class_features[] = ['room_class_id'=>$room_class->id ,'feature_id'=>$actual_features_ids['free_wifi_feature_id']];
                $room_class_features[] = ['room_class_id'=>$room_class->id ,'feature_id'=>$actual_features_ids['entertainment_feature_id']];
                $room_class_features[] = ['room_class_id'=>$room_class->id ,'feature_id'=>$actual_features_ids['snooker_feature_id']];
                $room_class_features[] = ['room_class_id'=>$room_class->id ,'feature_id'=>$actual_features_ids['coffee_machine_feature_id']];
                $room_class_features[] = ['room_class_id'=>$room_class->id ,'feature_id'=>$actual_features_ids['private_dining_feature_id']];
                $room_class_features[] = ['room_class_id'=>$room_class->id ,'feature_id'=>$actual_features_ids['luxurious_bath_amenities_feature_id']];
                $room_class_features[] = ['room_class_id'=>$room_class->id ,'feature_id'=>$actual_features_ids['swimming_pool_feature_id']];
            }elseif ($room_class->class === 'Presidential') {
                $room_class_features[] = ['room_class_id'=>$room_class->id ,'feature_id'=>$actual_features_ids['air_conditioning_feature_id']];
                $room_class_features[] = ['room_class_id'=>$room_class->id ,'feature_id'=>$actual_features_ids['free_wifi_feature_id']];
                $room_class_features[] = ['room_class_id'=>$room_class->id ,'feature_id'=>$actual_features_ids['entertainment_feature_id']];
                $room_class_features[] = ['room_class_id'=>$room_class->id ,'feature_id'=>$actual_features_ids['snooker_feature_id']];
                $room_class_features[] = ['room_class_id'=>$room_class->id ,'feature_id'=>$actual_features_ids['coffee_machine_feature_id']];
                $room_class_features[] = ['room_class_id'=>$room_class->id ,'feature_id'=>$actual_features_ids['private_dining_feature_id']];
                $room_class_features[] = ['room_class_id'=>$room_class->id ,'feature_id'=>$actual_features_ids['luxurious_bath_amenities_feature_id']];
                $room_class_features[] = ['room_class_id'=>$room_class->id ,'feature_id'=>$actual_features_ids['swimming_pool_feature_id']];
                $room_class_features[] = ['room_class_id'=>$room_class->id ,'feature_id'=>$actual_features_ids['personalized_bulter_feature_id']];
                $room_class_features[] = ['room_class_id'=>$room_class->id ,'feature_id'=>$actual_features_ids['spa_facilitie_feature_id']];
            }
        }
// print_r($room_class_features);
        //seeding
        foreach ($room_class_features as $room_class_feature) {
            RoomClassFeature::updateOrCreate(
                $room_class_feature,
                $room_class_feature
            );
        }
    }
}
