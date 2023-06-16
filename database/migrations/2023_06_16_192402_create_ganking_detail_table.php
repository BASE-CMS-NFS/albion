<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGankingDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ganking_detail', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('ganking_id');
            $table->string('users_id');
            $table->string('loot')->nullable();
            $table->double('presentase')->nullable();
            $table->double('regear')->nullable();
            $table->time('time_start', $precision = 0)->nullable();
            $table->time('time_end', $precision = 0)->nullable();
            $table->integer('play_time')->nullable();
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
        Schema::dropIfExists('ganking_detail');
    }
}
