<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_project_counters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id'); // Add project_id
            $table->string('ip_address');
            $table->timestamp('visited_at');
            $table->timestamps();

            // Add foreign key constraint if necessary
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('detail_project_counters', function (Blueprint $table) {
            $table->dropForeign(['project_id']);
        });

        Schema::dropIfExists('detail_project_counters');
    }
};
