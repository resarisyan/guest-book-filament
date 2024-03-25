<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory, HasUlids;
    protected $fillable = ['name', 'phone', 'purpose', 'time_slot_id'];

    public function timeSlot()
    {
        return $this->belongsTo(TimeSlot::class);
    }

    public function guestCategories()
    {
        return $this->hasMany(GuestCategory::class);
    }
}
