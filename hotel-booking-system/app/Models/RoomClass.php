<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Room;
use App\Models\RoomClassBedType;
use App\Models\RoomClassFeature;

class RoomClass extends Model
{
    use HasFactory;

    protected $fillable = ['class','base_price'];

    public function rooms() {
        return $this->hasMany(Room::class);
    }

    public function room_class_bed_types() {
        return $this->hasMany(RoomClassBedType::class);
    }

    public function room_class_features() {
        return $this->hasMany(RoomClassFeature::class);
    }
}
