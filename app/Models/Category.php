<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, HasUlids;
    protected $fillable = ['name'];

    public function guestCategories()
    {
        return $this->hasMany(GuestCategory::class);
    }
}
