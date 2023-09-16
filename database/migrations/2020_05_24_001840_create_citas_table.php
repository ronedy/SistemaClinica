<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cita', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_citada')->nullable();
            $table->time('hora_citada')->nullable();
            $table->datetime('fecha_atendida')->nullable();
            $table->unsignedBigInteger('id_cliente')->nullable();
            $table->unsignedBigInteger('id_doctor')->nullable();
            $table->string('motivo', 200)->nullable();
            $table->unsignedBigInteger('id_seguro')->nullable();
            $table->unsignedBigInteger('id_enfermedad')->nullable();
            $table->string('alergias', 255)->nullable();
            $table->string('receta', 255)->nullable();
            $table->double('valor_cobro', 10, 2)->nullable();
            $table->double('valor_descuento_seguro', 10, 2)->nullable();
            $table->double('total_pagar', 10, 2)->nullable();
            $table->integer('estado')->default(1);


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
        Schema::dropIfExists('cita');
    }
}
