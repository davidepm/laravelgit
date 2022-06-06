<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado__rols', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('empleadoId')->unsigned();
            $table->bigInteger('rolId')->unsigned();
            $table->timestamps();

            $table->foreign('empleadoId')->references('id')->on('empleados')->onDelete('cascade');
            $table->foreign('rolId')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleado__rols');
    }
};
