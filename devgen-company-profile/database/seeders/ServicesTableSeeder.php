<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('services')->insert([
            'icon' => 'dummy_icon.png',
            'title' => 'Sample Service',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
