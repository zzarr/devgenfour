<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateServicesTable extends Migration
{
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('image')->nullable()->after('description');
            $table->text('long_description')->nullable()->after('image');
            $table->string('icon')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('long_description');
            $table->string('icon')->nullable()->change();
        });
    }
}
