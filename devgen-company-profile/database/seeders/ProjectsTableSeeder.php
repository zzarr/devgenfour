<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('projects')->insert([
            'id_project' => Str::uuid()->toString(),
            'title' => 'Sample Project',
            'description' => 'This is a dummy description for the project.',
            'thumbnail' => 'dummy_thumbnail.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
