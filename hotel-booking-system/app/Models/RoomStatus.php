<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Room;

class RoomStatus extends Model
{
    use HasFactory;

    protected $fillable = ['status'];

    public function rooms() {
        return $this->hasMany(Room::class);
    }
}
