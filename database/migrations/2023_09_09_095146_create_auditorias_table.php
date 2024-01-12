<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Type\Integer;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('auditorias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('id_proveedor')->nullable();
            $table->integer('id_responsable')->nullable();
            $table->date('fecha_auditoria')->nullable();
            $table->date('fecha_ejecucion')->nullable();
            $table->string('tipo_auditoria')->nullable();
            $table->string('area')->nullable();
            $table->string('programa')->nullable();
            $table->integer('id_seccion')->nullable();
            $table->decimal('porcentaje',10,2)->nullable();
            $table->longText('observaciones')->nullable();
            $table->longText('conclusiones')->nullable();
            $table->integer('id_planta')->nullable();
            $table->string('status')->nullable();
            $table->string('organismo_auditor')->nullable();
            $table->string('linea_proceso')->nullable();
            #$table->string('tipo')->nullable()->comment('1 : Auditoria | 2 : Visita Inspectiva');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auditorias');
    }
};
