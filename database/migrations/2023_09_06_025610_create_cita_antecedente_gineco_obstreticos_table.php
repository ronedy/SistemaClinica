<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitaAntecedenteGinecoObstreticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cita_ant_gineco_obstretico', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('g', 50)->nullable();
            $table->string('p', 50)->nullable();
            $table->string('ab', 50)->nullable();
            $table->string('c', 50)->nullable();
            $table->string('hv', 50)->nullable();
            $table->string('hm', 50)->nullable();
            $table->string('menarquia', 50)->nullable();
            $table->string('ciclos', 50)->nullable();
            $table->string('fur', 50)->nullable();
            $table->string('fpp', 50)->nullable();
            $table->string('pap', 50)->nullable();
            $table->string('ets', 50)->nullable();
            $table->string('coitarquia', 50)->nullable();
            $table->string('grupo_rh', 50)->nullable();
            $table->unsignedInteger('no_parejas')->nullable();
            $table->string('observacion', 100)->nullable();
            $table->unsignedInteger('estado')->comment('0=eliminado\n1=activo');
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
        Schema::dropIfExists('cita_antecedente_gineco_obstretico');
    }
}
