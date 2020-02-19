<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->nullable(true);
            $table->string('phone', 20)->unique()->nullable();
            $table->unsignedSmallInteger('country_id')->nullable();
            $table->string('postcode')->nullable(true);
            $table->string('picture')->nullable(true);
            // $table->rememberToken();
            $table->boolean('blocked')->default(0);
            $table->boolean('active')->default(1);
            $table->timestamp('email_verified_at')->nullable(true);
            $table->timestamp('phone_verified_at')->nullable(true);
            $table->timestamp('last_login')->nullable(true);
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
        Schema::dropIfExists('users');
    }
}
