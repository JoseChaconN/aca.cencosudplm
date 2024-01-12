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
        Schema::create('biblioteca_documentos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('id_user')->nullable();
            $table->integer('id_solicitud')->nullable();
            $table->integer('id_auditoria')->nullable();
            $table->integer('id_visita_inspectiva')->nullable();
            $table->integer('id_documento_biblioteca')->nullable();
            $table->integer('id_producto')->nullable();
            $table->integer('id_prospecto')->nullable();
            $table->integer('id_proveedor')->nullable();
            $table->integer('id_documento')->nullable();            
            $table->date('fecha_emision')->nullable();
            $table->date('fecha_vencimiento')->nullable();
            $table->string('nombre_laboratorio')->nullable();
            $table->string('numero_certificado')->nullable();
            $table->date('fecha_analisis')->nullable();
            $table->string('duracion_validez')->nullable();
            $table->string('nombre_documento')->nullable();
            $table->string('area')->nullable();
            $table->longText('observacion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificaciones_producto');
    }
};
