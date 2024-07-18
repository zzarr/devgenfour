<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ChooseTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('choose')->insert([
            'title' => 'Choose Title 1',
            'description' => 'This is a dummy title for the why choose us section.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
