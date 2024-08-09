<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdateAppSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('app_settings', function (Blueprint $table) {
            // Modify 'logo' and 'secondary_logo' to be nullable
            $table->string('logo')->nullable()->change();
            $table->string('secondary_logo')->nullable()->change();
        });

        // Rename 'gmaap_coordinat' to 'gmap_coordinat' using raw SQL
        DB::statement('ALTER TABLE app_settings CHANGE gmaap_coordinat gmap_coordinat VARCHAR(255)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Revert 'logo' and 'secondary_logo' to not nullable if they exist
        Schema::table('app_settings', function (Blueprint $table) {
            $table->string('logo')->nullable(false)->change();
            $table->string('secondary_logo')->nullable(false)->change();
        });

        // Rename 'gmap_coordinat' back to 'gmaap_coordinat' using raw SQL
        DB::statement('ALTER TABLE app_settings CHANGE gmap_coordinat gmaap_coordinat VARCHAR(255)');
    }
}
