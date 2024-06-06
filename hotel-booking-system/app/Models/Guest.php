<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Booking;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = ['first_name','last_name','email_address','phone_number'];

    public function bookings() {
        return $this->hasMany(Booking::class);
    }
}
