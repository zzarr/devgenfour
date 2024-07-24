<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AboutUsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('about_us')->insert([
            'title' => 'About Us',
            'description' => 'This is a dummy description for the about us section.',
            'image' => 'dummy_image.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
