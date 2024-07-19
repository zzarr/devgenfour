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
            'id_team' => Str::uuid()->toString(),
            'name' => 'John Doe',
            'jabatan' => 'Team Leader',
            'foto' => 'dummy_thumbnail1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
