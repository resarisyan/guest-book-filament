<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Room::insert([
            ['id' => Str::uuid(), 'name' => 'Room 1', 'description' => 'Room 1 Description', 'capacity' => 10],
            ['id' => Str::uuid(), 'name' => 'Room 2', 'description' => 'Room 2 Description', 'capacity' => 20],
            ['id' => Str::uuid(), 'name' => 'Room 3', 'description' => 'Room 3 Description', 'capacity' => 30],
            ['id' => Str::uuid(), 'name' => 'Room 4', 'description' => 'Room 4 Description', 'capacity' => 40],
            ['id' => Str::uuid(), 'name' => 'Room 5', 'description' => 'Room 5 Description', 'capacity' => 50],
            ['id' => Str::uuid(), 'name' => 'Room 6', 'description' => 'Room 6 Description', 'capacity' => 60],
            ['id' => Str::uuid(), 'name' => 'Room 7', 'description' => 'Room 7 Description', 'capacity' => 70],
            ['id' => Str::uuid(), 'name' => 'Room 8', 'description' => 'Room 8 Description', 'capacity' => 80],
            ['id' => Str::uuid(), 'name' => 'Room 9', 'description' => 'Room 9 Description', 'capacity' => 90],
            ['id' => Str::uuid(), 'name' => 'Room 10', 'description' => 'Room 10 Description', 'capacity' => 100],
        ]);
    }
}
