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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_reqs')->nullable();
            $table->string('nama_project');
            $table->string('categories');
            $table->string('lokasi');
            $table->integer('luas_area');
            $table->string('nama_mandor');
            $table->foreignId('id_users')->nullable();
            $table->integer('dana');
            $table->string('time_plan');
            $table->string('image')->nullable();
            $table->string('more_desc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
