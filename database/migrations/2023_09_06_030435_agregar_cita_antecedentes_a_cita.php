<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgregarCitaAntecedentesACita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cita', function (Blueprint $table) {
            $table->unsignedBigInteger('id_cita_antecedente')
                ->after('estado')
                ->nullable();

            $table->unsignedBigInteger('id_cita_ant_gin_obs')
                ->after('id_cita_antecedente')
                ->nullable();

            $table->foreign('id_cita_antecedente')
                ->references('id')
                ->on('cita_antecedente');

            $table->foreign('id_cita_ant_gin_obs')
                ->references('id')
                ->on('cita_ant_gineco_obstretico');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cita', function (Blueprint $table) {
            $table->dropForeign(['id_cita_antecedente']);
            $table->dropForeign(['id_cita_ant_gin_obs']);

            $table->dropColumn('id_cita_antecedente');
            $table->dropColumn('id_cita_ant_gin_obs');
        });
    }
}
