<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            ['id' => Str::uuid(), 'name' => 'Wedding'],
            ['id' => Str::uuid(), 'name' => 'Birthday'],
            ['id' => Str::uuid(), 'name' => 'Anniversary'],
            ['id' => Str::uuid(), 'name' => 'Graduation'],
            ['id' => Str::uuid(), 'name' => 'Bridal Shower'],
            ['id' => Str::uuid(), 'name' => 'Baby Shower'],
            ['id' => Str::uuid(), 'name' => 'Reunion'],
            ['id' => Str::uuid(), 'name' => 'Corporate'],
            ['id' => Str::uuid(), 'name' => 'Other'],
        ]);
    }
}
