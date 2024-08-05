<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_counters', function (Blueprint $table) {
            $table->string('ip_address')->nullable();
            $table->timestamp('visited_at')->useCurrent()->nullable();
            $table->dropColumn('count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_counters', function (Blueprint $table) {
            $table->integer('count')->default(0);
            $table->dropColumn('ip_address');
            $table->dropColumn('visited_at');
        });
    }
};
