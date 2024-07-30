<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TeamsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('teams')->insert([
            'name' => 'John Doe',
            'jabatan' => 'Team Leader',
            'foto' => 'dummy_thumbnail1',
            'facebook' => 'https://facebook.com',
            'instagram' => 'https://instagram.com',
            'linkedin' => 'https://linkedin.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
