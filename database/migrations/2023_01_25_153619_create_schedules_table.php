<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement()->index();
            $table->unsignedBigInteger('movie_id')->index();
            $table->dateTime('start_time')->comment('上映開始時刻');
            $table->dateTime('end_time')->comment('上映終了時刻');
            $table->timestamps();
        });

        Schema::table('schedules', function (Blueprint $table) {
            $table->foreign('movie_id')->references('id')->on('movies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
};