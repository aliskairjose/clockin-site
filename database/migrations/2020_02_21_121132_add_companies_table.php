<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('phone', 20)->nullable();
            $table->string('email')->unique();
            $table->text('address')->nullable(true)->comment('Direccion de la empresa');
            $table->string('picture')->nullable(true)->comment('Imagen de la empresa');
            $table->unsignedBigInteger('country_id')->unsigned()->nullable(true)->index('country_id');

            $table->foreign('country_id')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
