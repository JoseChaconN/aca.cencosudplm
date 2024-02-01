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
        Schema::create('solicitud_prospecto_productos_importados_aca', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->bigInteger('n_solicitud')->nullable();
            $table->bigInteger('n_solicitud_padre')->nullable();
            $table->integer('id_creador')->nullable();
            $table->integer('id_comercial')->nullable();
            $table->integer('id_calidad')->nullable();
            $table->integer('tipo_proveedor')->nullable()->comment('1 = Normail | 2 = Licores');;
            $table->integer('id_proveedor')->nullable();
            $table->string('nombre_proveedor')->nullable();
            $table->string('rut_proveedor')->nullable();
            $table->integer('estado_solicitud')->default(0)->comment('0 = Sin Notificar | 1 = Comercial | 2 = Calidad | 3 = Proveedor');
            $table->integer('status')->default(1);
            $table->date('re_abrir')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud_prospecto_productos_importados_aca');
    }
};
