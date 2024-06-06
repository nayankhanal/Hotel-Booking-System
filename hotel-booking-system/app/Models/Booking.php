<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\BookingRoom;
use App\Models\BookingAddon;
use App\Models\Guest;
use App\Models\PaymentStatus;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['guest_id','payment_status_id','checkin_date','checkout_date', 'num_adults','num_children','booking_amount'];

    public function booking_rooms() {
        return $this->hasMany(BookingRoom::class);
    }

    public function booking_addons() {
        return $this->hasMany(BookingAddon::class);
    }

    public function guest() {
        return $this->belongsTO(Guest::class);
    }

    public function payment_status() {
        return $this->hasMany(PaymentStatus::class);
    }
}
