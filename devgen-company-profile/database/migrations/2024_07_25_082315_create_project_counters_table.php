<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// database/migrations/xxxx_xx_xx_create_project_clicks_table.php
public function up()
{
    Schema::create('project_counters', function (Blueprint $table) {
        $table->id();
        $table->integer('count')->default(0);
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('project_counters');
}
};