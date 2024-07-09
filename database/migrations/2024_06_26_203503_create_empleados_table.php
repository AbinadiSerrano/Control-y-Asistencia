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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('CI');
            $table->string('nombre');
            $table->string('paterno');
            $table->string('materno');
            $table->date('fecha_nacimiento');
            $table->string('direccion');
            $table->char('genero',1);
            $table->string('image_url');
            $table->foreignId('cargo_id')->constrained('cargos');
            $table->foreignId('horario_id')->constrained('horarios');
            $table->date('fecha_contrato');
            $table->float('sueldo', 8, 2);
            $table->float('descuentodia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
