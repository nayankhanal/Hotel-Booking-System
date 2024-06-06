<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\RoomStatus;

class RoomStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = ['Occupied','Available','Ready to clean'];

        foreach ($statuses as $status) {
            RoomStatus::updateOrCreate(
                ['status'=>$status],
                ['status'=>$status]
            );
        }
    }
}
