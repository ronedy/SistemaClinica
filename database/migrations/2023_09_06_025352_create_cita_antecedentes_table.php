<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitaAntecedentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cita_antecedente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('medicos', 200)->nullable();
            $table->string('quirurgicos', 200)->nullable();
            $table->string('alergicos', 200)->nullable();
            $table->string('traumaticos', 200)->nullable();
            $table->string('familiares', 200)->nullable();
            $table->string('observacion', 200)->nullable();
            $table->unsignedInteger('estado')->comment('0=eliminado\1n=activo');
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
        Schema::dropIfExists('cita_antecedente');
    }
}
