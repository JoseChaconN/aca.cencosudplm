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
        Schema::create('productos_solicitud_prospectos_aca', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('id_solicitud');
            $table->integer('id_proveedor')->nullable();
            $table->string('nombre_producto')->nullable();
            $table->integer('id_seccion')->nullable();
            $table->string('seccion')->nullable();
            $table->string('marca')->nullable();
            $table->string('codigo_barra')->nullable();
            $table->integer('vida_util_producto')->nullable();
            $table->string('tiempo_vida_util_producto')->nullable();
            $table->longText('codigo_barra_producto_obs')->nullable();
            $table->longText('nombre_producto_obs')->nullable();
            $table->string('nombre_fabricante')->nullable();
            $table->longText('nombre_fabricante_obs')->nullable();
            $table->string('nombre_domicilio_importador')->nullable();
            $table->longText('nombre_domicilio_importador_obs')->nullable();
            $table->string('domicilio_prov')->nullable();
            $table->longText('domicilio_prov_obs')->nullable();
            $table->string('fecha_elab_envase')->nullable();
            $table->longText('fecha_elab_envase_obs')->nullable();
            $table->string('fecha_venc_dura')->nullable();
            $table->longText('fecha_venc_dura_obs')->nullable();
            $table->string('res_sanitaria')->nullable();
            $table->longText('res_sanitaria_obs')->nullable();
            $table->string('cont_neto')->nullable();
            $table->longText('cont_neto_obs')->nullable();
            $table->string('cont_drenado_escurrido')->nullable();
            $table->longText('cont_drenado_escurrido_obs')->nullable();
            $table->integer('pais_origen')->nullable();
            $table->longText('pais_origen_obs')->nullable();
            $table->string('indica_uso')->nullable();
            $table->longText('indica_uso_obs')->nullable();
            $table->string('instru_almacena')->nullable();
            $table->longText('instru_almacena_obs')->nullable();
            $table->string('ingredientes')->nullable();
            $table->longText('ingredientes_obs')->nullable();
            $table->string('alto_calorias')->nullable();
            $table->string('alto_grasas_saturadas')->nullable();
            $table->string('alto_azucares')->nullable();
            $table->string('alto_sodio')->nullable();
            $table->longText('disco_obs')->nullable();
            $table->string('razon_social_logo')->nullable();
            $table->string('especie_logo')->nullable();
            $table->string('variedad_logo')->nullable();
            $table->string('organico_logo')->nullable();
            $table->string('tipo_organico_logo')->nullable();
            $table->string('certificado_por_logo')->nullable();
            $table->integer('entrega_muestra')->nullable();
            $table->integer('estado_cl')->default(1);
            $table->longText('observacion_solicitud')->nullable();
            $table->date('fecha_cierre')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos_solicitud_prospectos_aca');
    }
};
