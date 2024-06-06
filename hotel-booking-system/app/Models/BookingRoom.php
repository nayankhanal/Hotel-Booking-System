<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Room;
use App\Models\Booking;

class BookingRoom extends Model
{
    use HasFactory;

    protected $fillable = ['booking_id','room_id'];

    public function room() {
        return $this->belongsTO(Room::class);
    }

    public function booking() {
        return $this->belongsTO(Booking::class);
    }
}
