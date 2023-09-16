<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_especialidad')->nullable();
            $table->string('nombre', 100)->nullable();
            $table->string('apellido', 100)->nullable();
            $table->string('direccion', 100)->nullable();
            $table->string('telefono', 50)->nullable();
            $table->string('correo', 50)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();

            $table->foreign('id_especialidad')->references('id')->on('especialidad');
            $table->foreign('id_usuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor');
    }
}
