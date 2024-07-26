<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutUsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('about_us')->insert([
            'id' => '1',
            'title' => 'Our Story',
            'description' => 'Welcome to our company. We are dedicated to providing the best service and experience.',
            'image' => 'default-image.jpg',
            'title' => 'About Us',
            'description' => 'This is a dummy description for the about us section.',
            'image' => 'dummy_image.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
