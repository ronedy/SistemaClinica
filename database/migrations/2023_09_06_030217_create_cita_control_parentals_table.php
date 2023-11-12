<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitaControlParentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cita_control_parental', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_cita');
            $table->string('edad_gestacional', 50)->nullable();
            $table->string('presion_arterial', 50)->nullable();
            $table->string('altura_uterina', 50)->nullable();
            $table->string('presentacion', 50)->nullable();
            $table->string('fcf', 50)->nullable();
            $table->string('peso', 50)->nullable();
            $table->string('ultrasonido', 50)->nullable();
            $table->string('vacunas', 50)->nullable();
            $table->unsignedInteger('estado')->comment('0=eliminado\n1=activo');
            $table->timestamps();

            $table->foreign('id_cita')->references('id')->on('cita');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cita_control_parental');
    }
}
