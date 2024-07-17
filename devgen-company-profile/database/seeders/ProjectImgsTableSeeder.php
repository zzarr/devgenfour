<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectImgsTableSeeder extends Seeder
{
    public function run()
    {
        // Ensure there's at least one project to link the image to
        $projectId = DB::table('projects')->first()->id_project ?? Str::uuid()->toString();

        // Insert a dummy project if none exists
        if (DB::table('projects')->count() == 0) {
            DB::table('projects')->insert([
                'id_project' => $projectId,
                'title' => 'Sample Project',
                'description' => 'This is a dummy description for the project.',
                'thumbnail' => 'dummy_thumbnail.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Insert a dummy image record
        DB::table('project_imgs')->insert([
            'id_project' => $projectId,
            'image_name' => 'dummy_image.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
