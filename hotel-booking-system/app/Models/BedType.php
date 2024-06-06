<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\RoomClassBedType;

class BedType extends Model
{
    use HasFactory;

    protected $fillable = ['bed_type'];

    public function room_class_bed_types() {
        return $this->hasMany(RoomClassBedType::class);
    }
}
