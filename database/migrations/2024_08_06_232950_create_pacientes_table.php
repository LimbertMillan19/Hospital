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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_completo');
            $table->integer('edad');
            $table->char('sexo', 1);
            $table->date('fecha_nacimiento');
            $table->string('ciudad_origen');
            $table->date('fecha_inscripcion');
            $table->foreignId('hospital_id')->constrained('hospitals')->onDelete('cascade');
            $table->string('nombre_tutor');
            $table->string('telefono_tutor', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
