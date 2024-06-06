<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Booking;

class PaymentStatus extends Model
{
    use HasFactory;

    protected $fillable = ['status'];

    public function bookings() {
        return $this->hasMany(Booking::class);
    }
}
