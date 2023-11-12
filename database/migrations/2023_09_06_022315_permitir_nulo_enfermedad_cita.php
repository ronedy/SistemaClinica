<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermitirNuloEnfermedadCita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cita', function (Blueprint $table) {
            $table->unsignedBigInteger('id_enfermedad')->nullable()->change();
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
            $table->unsignedBigInteger('id_enfermedad')->change();
        });
    }
}
