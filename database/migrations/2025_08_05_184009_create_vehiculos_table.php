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
       Schema::create('vehiculo', function (Blueprint $table) {
    $table->id();
    $table->string('marca');
    $table->string('modelo');
    $table->year('anio');
    $table->decimal('precio', 10, 2);
    $table->enum('estado', ['Disponible', 'Vendido', 'En mantenimiento'])->default('Disponible');
    $table->integer('kilometraje');
    $table->string('color');
    $table->timestamps();
     $table->softDeletes(); //eliminacion logica
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculo');
    }
};
