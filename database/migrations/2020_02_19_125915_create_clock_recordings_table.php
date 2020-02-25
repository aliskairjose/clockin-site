<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClockRecordingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clock_recordings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('type')->comment('1 para in or 2 para out');
            $table->string('ip');
            $table->decimal('lat', 8,6)->signed();
            $table->decimal('lon', 9,6)->signed();
            $table->string('device_name');
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
        Schema::dropIfExists('clock_recordings');
    }
}
