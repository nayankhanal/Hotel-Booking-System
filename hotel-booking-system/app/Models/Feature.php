<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\RoomCLassFeature;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = ['feature_name'];

    public function room_class_features() {
        return $this->hasMany(RoomClassFeature::class);
    }
}
