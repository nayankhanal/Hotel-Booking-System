<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\RoomClass;
use App\Models\Feature;

class RoomClassFeature extends Model
{
    use HasFactory;

    protected $fillable = ['feature'];

    public function room_class() {
        return $this->belongsTo(RoomClass::class);
    }

    public function feature() {
        return $this->belongsTo(Feature::class);
    }
}
