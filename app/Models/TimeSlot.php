<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    use HasFactory, HasUlids;
    protected $fillable = ['name', 'room_id', 'start_time', 'end_time', 'date'];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
