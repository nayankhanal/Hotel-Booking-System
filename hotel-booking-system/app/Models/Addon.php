<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\BookingAddon;

class Addon extends Model
{
    use HasFactory;

    protected $fillable = ['addon_name','price'];

    public function booking_addons() {
        return $this->hasMany(BookingAddon::class);
    }
}
