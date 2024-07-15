<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('app_settings', function (Blueprint $table) {
            $table->id('id_setting');
            $table->string('name_app');
            $table->text('desc');
            $table->string('logo');
            $table->string('no_contact');
            $table->string('email');
            $table->string('instagram');
            $table->string('alamat');
            $table->string('gmaap_coordinat');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('app_settings');
    }
}
