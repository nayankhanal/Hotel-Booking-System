<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Room;

class Floor extends Model
{
    use HasFactory;

    protected $fillable = ['floor_number'];

    public function rooms() {
        return $this->hasMany(Room::class);
    }
}
