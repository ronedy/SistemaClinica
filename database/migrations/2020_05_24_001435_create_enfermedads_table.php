<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnfermedadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enfermedad', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descripcion', 100)->nullable();
            $table->string('sintoma', 100)->nullable();
            $table->string('receta', 100)->nullable();
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();

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
        Schema::dropIfExists('enfermedad');
    }
}
