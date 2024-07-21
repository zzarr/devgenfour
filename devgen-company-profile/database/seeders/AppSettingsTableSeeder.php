<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppSettingsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('app_settings')->insert([
            'name_app' => 'Dummy App',
            'desc' => 'This is a dummy description for the app.',
            'logo' => 'dummy_logo.png',
            'no_contact' => '123456789',
            'email' => 'dummy@app.com',
            'instagram' => 'dummy_instagram',
            'alamat' => '123 Dummy Street',
            'gmaap_coordinat' => '12.3456, -65.4321',
            'created_at' => now(),
            'updated_at' => now(),

        ]);

    }
}
