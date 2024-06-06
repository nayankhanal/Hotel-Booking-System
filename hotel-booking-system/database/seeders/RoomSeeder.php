<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Floor;
use App\Models\RoomClass;
use App\Models\RoomStatus;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $floors = Floor::all();
        $room_classes = RoomClass::all();
        $room_statuses = RoomStatus::all();

        $all_rooms = [];

        //room number with respective floor
        for($i=1;$i<=100;$i++){
            if($i<=10){
                $floor_id;
                foreach ($floors as $floor) {
                    if($floor->floor === 'First'){
                        $floor_id = $floor->id;
                        break;
                    }
                }
                $all_rooms[] = ['room_number'=>$i, 'floor_id'=>$floor_id];
            }elseif ($i<=20) {
                $floor_id;
                foreach ($floors as $floor) {
                    if($floor->floor === 'Second'){
                        $floor_id = $floor->id;
                        break;
                    }
                }
                $all_rooms[] = ['room_number'=>$i, 'floor_id'=>$floor_id];
            }elseif ($i<=30) {
                $floor_id;
                foreach ($floors as $floor) {
                    if($floor->floor === 'Third'){
                        $floor_id = $floor->id;
                        break;
                    }
                }
                $all_rooms[] = ['room_number'=>$i, 'floor_id'=>$floor_id];
            }elseif ($i<=40) {
                $floor_id;
                foreach ($floors as $floor) {
                    if($floor->floor === 'Fourth'){
                        $floor_id = $floor->id;
                        break;
                    }
                }
                $all_rooms[] = ['room_number'=>$i, 'floor_id'=>$floor_id];
            }elseif ($i<=50) {
                $floor_id;
                foreach ($floors as $floor) {
                    if($floor->floor === 'Fifth'){
                        $floor_id = $floor->id;
                        break;
                    }
                }
                $all_rooms[] = ['room_number'=>$i, 'floor_id'=>$floor_id];
            }elseif ($i<=60) {
                $floor_id;
                foreach ($floors as $floor) {
                    if($floor->floor === 'Sixth'){
                        $floor_id = $floor->id;
                        break;
                    }
                }
                $all_rooms[] = ['room_number'=>$i, 'floor_id'=>$floor_id];
            }elseif ($i<=70) {
                $floor_id;
                foreach ($floors as $floor) {
                    if($floor->floor === 'Seventh'){
                        $floor_id = $floor->id;
                        break;
                    }
                }
                $all_rooms[] = ['room_number'=>$i, 'floor_id'=>$floor_id];
            }elseif ($i<=80) {
                $floor_id;
                foreach ($floors as $floor) {
                    if($floor->floor === 'Eighth'){
                        $floor_id = $floor->id;
                        break;
                    }
                }
                $all_rooms[] = ['room_number'=>$i, 'floor_id'=>$floor_id];
            }elseif ($i<=90) {
                $floor_id;
                foreach ($floors as $floor) {
                    if($floor->floor === 'Ninth'){
                        $floor_id = $floor->id;
                        break;
                    }
                }
                $all_rooms[] = ['room_number'=>$i, 'floor_id'=>$floor_id];
            }elseif ($i<=100) {
                $floor_id;
                foreach ($floors as $floor) {
                    if($floor->floor === 'Tenth'){
                        $floor_id = $floor->id;
                        break;
                    }
                }
                $all_rooms[] = ['room_number'=>$i, 'floor_id'=>$floor_id];
            }
        }


        //room number and floor with respective room class
        foreach ($all_rooms as $key => $room) {
            if((($room['room_number']>=1) && ($room['room_number']<=10)) || (($room['room_number']>25) && ($room['room_number']<=50))){
                foreach ($room_classes as $room_class) {
                    if($room_class->class==='Deluxe'){
                        $all_rooms[$key]['room_class_id'] = $room_class->id;
                        break;
                    }
                }
            }

            if((($room['room_number']>10) && ($room['room_number']<=25)) || (($room['room_number']>50) && ($room['room_number']<=63))){
                foreach ($room_classes as $room_class) {
                    if($room_class->class==='Standard'){
                        $all_rooms[$key]['room_class_id'] = $room_class->id;
                        break;
                    }
                }
            }

            if(($room['room_number']>63) && ($room['room_number']<=90)){
                foreach ($room_classes as $room_class) {
                    if($room_class->class==='Premium'){
                        $all_rooms[$key]['room_class_id'] = $room_class->id;
                        break;
                    }
                }
            }

            if(($room['room_number']>90) && ($room['room_number']<=100)){
                foreach ($room_classes as $room_class) {
                    if($room_class->class==='Presidential'){
                        $all_rooms[$key]['room_class_id'] = $room_class->id;
                        break;
                    }
                }
            }
        }

        //room number, floor, room class with room status
        foreach ($all_rooms as $key=>$room) {
            foreach ($room_statuses as $room_status) {
                if($room_status->status === 'Available'){
                    $all_rooms[$key]['room_status_id'] = $room_status->id;
                }
            }
        }

        foreach ($all_rooms as $key=>$room) {
            Room::updateOrCreate(
                ['room_number'=>$room['room_number']],
                $room
            );
        }

    }
}
