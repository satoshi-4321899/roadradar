<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Brand::create([
            'name' => 'test',
            'info' => 'seeder test',
            'image' => 'user_default.jpg',
            'admin_id' => 1,
        ]);
    }
}
