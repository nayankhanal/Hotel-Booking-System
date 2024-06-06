<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\BedType;
use App\Models\RoomClass;
use App\Models\RoomClassBedType;

class RoomClassBedTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $room_classes = RoomClass::all();
        $bed_types = BedType::all();

        $room_types_ids = [];

        $room_classes_bed_types = [];

        //retrieving bed type class
        foreach ($bed_types as $bed_type) {
            $room_types_ids[] = match ($bed_type->bed_type) {
                'Single' => ['single_bed_id'=>$bed_type->id],
                'Double' => ['double_bed_id'=>$bed_type->id],
                'Queen' => ['queen_bed_id'=>$bed_type->id],
                'King' => ['king_bed_id'=>$bed_type->id],
            };
        }

        // print_r($room_classes_ids);
        // print_r($room_types_ids);

        $actual_room_types_ids = [];
        foreach ($room_types_ids as $room_type_id) {
            $actual_room_types_ids = $actual_room_types_ids + $room_type_id;
        }

        // print_r($actual_room_types_ids);

        //rooms with relative bed types
        foreach ($room_classes as $room_class) {
            if($room_class->class === 'Deluxe'){
                $room_classes_bed_types[] = ['room_class_id'=>$room_class->id, 'bed_type_id'=>$actual_room_types_ids['single_bed_id'], 'num_beds'=>1];
                $room_classes_bed_types[] = ['room_class_id'=>$room_class->id, 'bed_type_id'=>$actual_room_types_ids['double_bed_id'], 'num_beds'=>1];
            }elseif ($room_class->class === 'Standard') {
                $room_classes_bed_types[] = ['room_class_id'=>$room_class->id, 'bed_type_id'=>$actual_room_types_ids['single_bed_id'], 'num_beds'=>1];
                $room_classes_bed_types[] = ['room_class_id'=>$room_class->id, 'bed_type_id'=>$actual_room_types_ids['double_bed_id'], 'num_beds'=>1];
            }elseif ($room_class->class === 'Premium') {
                $room_classes_bed_types[] = ['room_class_id'=>$room_class->id, 'bed_type_id'=>$actual_room_types_ids['king_bed_id'], 'num_beds'=>1];
                $room_classes_bed_types[] = ['room_class_id'=>$room_class->id, 'bed_type_id'=>$actual_room_types_ids['double_bed_id'], 'num_beds'=>1];
            }elseif ($room_class->class === 'Presidential') {
                $room_classes_bed_types[] = ['room_class_id'=>$room_class->id, 'bed_type_id'=>$actual_room_types_ids['king_bed_id'], 'num_beds'=>1];
                $room_classes_bed_types[] = ['room_class_id'=>$room_class->id, 'bed_type_id'=>$actual_room_types_ids['queen_bed_id'], 'num_beds'=>1];
            }
        }

        // print_r($room_classes_bed_types);

        foreach ($room_classes_bed_types as $room_class_bed_type) {
            RoomClassBedType::updateOrCreate(
                $room_class_bed_type,
                $room_class_bed_type
            );
        }
    }
}
