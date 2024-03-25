<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\TimeSlot;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class TimeSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = Room::all();
        $data = [
            ['id' => Str::uuid(), 'name' => 'Time Slot 1', 'start_time' => '08:00', 'end_time' => '09:00', 'room_id' => $rooms->random()->id, 'date' => '2024-03-25'],
            ['id' => Str::uuid(), 'name' => 'Time Slot 2', 'start_time' => '09:00', 'end_time' => '10:00', 'room_id' => $rooms->random()->id, 'date' => '2024-03-26'],
            ['id' => Str::uuid(), 'name' => 'Time Slot 3', 'start_time' => '10:00', 'end_time' => '11:00', 'room_id' => $rooms->random()->id, 'date' => '2024-03-27'],
            ['id' => Str::uuid(), 'name' => 'Time Slot 4', 'start_time' => '11:00', 'end_time' => '12:00', 'room_id' => $rooms->random()->id, 'date' => '2024-03-28'],
            ['id' => Str::uuid(), 'name' => 'Time Slot 5', 'start_time' => '12:00', 'end_time' => '13:00', 'room_id' => $rooms->random()->id, 'date' => '2024-03-29'],
            ['id' => Str::uuid(), 'name' => 'Time Slot 6', 'start_time' => '13:00', 'end_time' => '14:00', 'room_id' => $rooms->random()->id, 'date' => '2024-03-30'],
            ['id' => Str::uuid(), 'name' => 'Time Slot 7', 'start_time' => '14:00', 'end_time' => '15:00', 'room_id' => $rooms->random()->id, 'date' => '2024-03-31'],
            ['id' => Str::uuid(), 'name' => 'Time Slot 8', 'start_time' => '15:00', 'end_time' => '16:00', 'room_id' => $rooms->random()->id, 'date' => '2024-04-01'],
            ['id' => Str::uuid(), 'name' => 'Time Slot 9', 'start_time' => '16:00', 'end_time' => '17:00', 'room_id' => $rooms->random()->id, 'date' => '2024-05-02'],
            ['id' => Str::uuid(), 'name' => 'Time Slot 10', 'start_time' => '17:00', 'end_time' => '18:00', 'room_id' => $rooms->random()->id, 'date' => '2024-06-03'],
        ];
        TimeSlot::insert($data);
    }
}
