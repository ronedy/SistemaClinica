<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 100)->nullable();
            $table->string('apellido', 100)->nullable();
            $table->string('direccion', 100)->nullable();
            $table->string('telefono', 100)->nullable();
            $table->string('correo', 100)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('dpi')->nullable();
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
        Schema::dropIfExists('clientes');
    }
}
