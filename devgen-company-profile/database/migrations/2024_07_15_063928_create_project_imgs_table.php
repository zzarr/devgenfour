<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectImgsTable extends Migration
{
    public function up()
    {
        Schema::create('project_imgs', function (Blueprint $table) {
            $table->id('id_img');
            $table->string('id_project');
            $table->string('image_name');
            $table->foreign('id_project')->references('id_project')->on('projects')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_imgs');
    }
}