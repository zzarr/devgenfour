<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartnersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('partners')->insert([
            'image' => 'dummy_image.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
