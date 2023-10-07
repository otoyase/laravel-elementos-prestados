<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prestatario_id');
            $table->foreign('prestatario_id')->references('id')->on('users');
            $table->unsignedBigInteger('prestamista_id');
            $table->foreign('prestamista_id')->references('id')->on('users');
            $table->unsignedBigInteger('elemento_prestado_id');
            $table->foreign('elemento_prestado_id')->references('id')->on('elementos');
            $table->dateTime('fecha_hora_prestamo');
            $table->dateTime('fecha_hora_devolucion')->nullable();
            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
