<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\BookingRoom;
use App\Models\Floor;
use App\Models\RoomClass;
use App\Models\RoomStatus;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['floor_id','room_class_id','room_status_id','room_number'];

    public function booking_rooms() {
        return $this->hasMany(BookingRoom::class);
    }

    public function floor() {
        return $this->belongsTo(Floor::class);
    }

    public function room_class() {
        return $this->belongsTo(RoomClass::class);
    }

    public function room_status() {
        return $this->belongsTo(RoomStatus::class);
    }
}
