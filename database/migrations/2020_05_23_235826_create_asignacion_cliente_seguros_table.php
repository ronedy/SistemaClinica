<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignacionClienteSegurosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacion_cliente_seguro', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_cliente')->nullable();
            $table->unsignedBigInteger('id_seguro')->nullable();
            $table->double('valor_descuento', 10, 2)->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();

            $table->foreign('id_cliente')->references('id')->on('cliente');
            $table->foreign('id_seguro')->references('id')->on('seguro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignacion_cliente_seguro');
    }
}
