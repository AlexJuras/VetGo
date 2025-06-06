<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('clinic_id')->constrained()->onDelete('cascade');
            $table->foreignId('tutor_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('animal_id')->constrained()->onDelete('cascade');
            $table->foreignId('estudante_id')->constrained()->onDelete('cascade');
            $table->dateTime('data_consulta');
            $table->time('horario');
            $table->decimal('valor', 8, 2)->nullable();
            $table->string('forma_pagamento');
            $table->enum('tipo_consulta', [
                'Rotina',
                'Emergência',
                'Retorno',
                'Exame',
                'Outros',
            ]);
            $table->enum('status', [
                'agendada',
                'em_andamento',
                'concluida',
                'cancelada',
            ])->default('agendada');
            $table->text('observacoes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
