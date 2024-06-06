<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Addon;
use App\Models\Booking;

class BookingAddon extends Model
{
    use HasFactory;

    protected $fillable = ['booking_id','addon_id'];

    public function addon() {
        return $this->belongsTO(Addon::class);
    }

    public function booking() {
        return $this->belongsTO(Booking::class);
    }
}
