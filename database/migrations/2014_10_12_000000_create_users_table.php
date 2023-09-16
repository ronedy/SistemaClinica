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
            $table->string('name', 100)->nullable();
            $table->string('apellido', 100)->nullable();
            $table->string('direccion', 100)->nullable();
            $table->string('telefono', 100)->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('username', 100)->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->integer('estado')->default(1)->nullable();
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
