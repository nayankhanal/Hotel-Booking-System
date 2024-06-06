<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\RoomClass;
use App\Models\BedType;

class RoomClassBedType extends Model
{
    use HasFactory;

    protected $fillable = ['room_class_id','bed_type_id','num_beds'];

    public function room_class() {
        return $this->belongsTo(RoomClass::class);
    }

    public function bed_type() {
        return $this->belongsTo(BedType::class);
    }
}
