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
        Schema::create('listado_documentos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('nombre')->nullable();
            $table->string('tag')->nullable();
            $table->integer('tipo_documento')->nullable()->comment('1: Vencimiento | 2: Fijas | 3: Solicitados Proveedor');
            $table->integer('mostrar_auditoria')->nullable();
            $table->integer('mostrar_prospecto')->nullable();
            $table->integer('mostrar_visitas_inspectivas')->nullable();
            $table->integer('mostrar_agregar_documento_biblioteca')->default(1);
            $table->integer('validar_vencimiento')->default(0);
            $table->integer('file')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listado_documentos');
    }
};
