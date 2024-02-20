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
        Schema::create('versiones_productos_solicitud_importados_aca', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('producto_id');
            $table->integer('id_solicitud');
            $table->integer('estado_cl')->default(1);
            $table->longText('observacion_solicitud')->nullable();
            $table->date('fecha_cierre')->nullable();
            $table->integer('id_proveedor')->nullable();
            $table->integer('id_seccion')->nullable();
            $table->string('seccion')->nullable();
            $table->integer('sap')->nullable();
            $table->string('version',10)->nullable();
            $table->string('product_name',50)->nullable();
            $table->string('product_name_spanish',50)->nullable();
            $table->string('claims_origin',50)->nullable();
            $table->string('comments',50)->nullable();
            $table->string('name_organic_certifying_number',50)->nullable();
            $table->string('plant_number_factory',50)->nullable();
            $table->string('net_weight',50)->nullable();
            $table->string('drained_weight',50)->nullable();
            $table->string('units_x_packaging',50)->nullable();
            $table->string('country',50)->nullable();
            $table->string('milking_country',50)->nullable();
            $table->string('expiration_date',50)->nullable();
            $table->string('name_adress_manufacturer',50)->nullable();
            $table->string('shelf_life',50)->nullable();
            $table->string('upc_bar_code',50)->nullable();
            $table->string('storage_conditions',50)->nullable();
            $table->string('method_preparation',50)->nullable();
            $table->string('name_supplier',50)->nullable();
            $table->string('ingredients',50)->nullable();
            $table->string('porcent_organic_ingredients',50)->nullable();
            $table->string('porcent_characterizing_ingredients',50)->nullable();
            $table->string('name_additive',50)->nullable();
            $table->string('porcent_additive',50)->nullable();
            $table->string('quantity_additive',50)->nullable();
            $table->string('indicate_additive_code',50)->nullable();
            $table->string('indicate_additive_functionality',50)->nullable();
            $table->string('vegetable_oil_fat_used',50)->nullable();
            $table->string('trans_fats_hydrogenated_origin',50)->nullable();
            $table->string('spices_herbs_used',50)->nullable();
            $table->string('quantity_sweetener_per_100_gr_ml',50)->nullable();
            $table->string('flavourings_aroma_natural_artificial',50)->nullable();
            $table->string('quantity_x_m_s_g',50)->nullable();
            $table->string('quantity_caffeine',50)->nullable();
            $table->string('any_extract_used',50)->nullable();
            $table->string('origin_gelatin',50)->nullable();
            $table->string('brix_final_product',50)->nullable();
            $table->string('brix_final_product_without_added_sugar',50)->nullable();
            $table->string('brix_fruit_greater_proportion_drink',50)->nullable();
            $table->string('names_colourings',50)->nullable();
            $table->string('minimum_porcent_cocoa_solids',50)->nullable();
            $table->string('porcent_cocoa_butter_cocoa_mass',50)->nullable();
            $table->string('contain_potential_allergens',50)->nullable();
            $table->string('cereals_gluten',50)->nullable();
            $table->string('crustacean_products',50)->nullable();
            $table->string('egg_derivatives',50)->nullable();
            $table->string('fish_derivatives',50)->nullable();
            $table->string('peanuts_soy_derivatives',50)->nullable();
            $table->string('milk_dairy_derivatives',50)->nullable();
            $table->string('nuts_derivatives',50)->nullable();
            $table->string('sulfites_derivatives',50)->nullable();
            $table->string('total_plate_count',50)->nullable();
            $table->string('coliform',50)->nullable();
            $table->string('e_coli',50)->nullable();
            $table->string('e_coli_100',50)->nullable();
            $table->string('e_coli_0157_h7',50)->nullable();
            $table->string('campylobacter',50)->nullable();
            $table->string('bacillus_cereus',50)->nullable();
            $table->string('staphylococcus',50)->nullable();
            $table->string('clostridium_perfringens',50)->nullable();
            $table->string('listeria_monocytogenes',50)->nullable();
            $table->string('enterobacteria',50)->nullable();
            $table->string('mold',50)->nullable();
            $table->string('yeast',50)->nullable();
            $table->string('mold_count',50)->nullable();
            $table->string('yeast_count',50)->nullable();
            $table->string('salmonella_25',50)->nullable();
            $table->string('salmonella_50',50)->nullable();
            $table->string('lactobacillus',50)->nullable();
            $table->string('aerobic_anaerobic_mesophilic_microorganisms',50)->nullable();
            $table->string('aerobic_anaerobic_thermophilic_microorganisms',50)->nullable();
            $table->string('thermophilic_commercial_sterility',50)->nullable();
            $table->string('anaerobic_spores_reducing_sulfites',50)->nullable();
            $table->string('cronobacter_10g',50)->nullable();
            $table->string('ph',50)->nullable();
            $table->string('porcent_aw',50)->nullable();
            $table->string('type_primary_packaging',50)->nullable();
            $table->string('type_secundary_packaging',50)->nullable();
            $table->string('type_controls_sealing_air_tightness_primary_packaging',50)->nullable();
            $table->string('product_type',50)->nullable();
            $table->string('serving_size',50)->nullable();
            $table->string('servings_per_container',50)->nullable();
            $table->string('energy_100',5)->nullable();
            $table->string('proteins_100',5)->nullable();
            $table->string('total_fat_100',5)->nullable();
            $table->string('satured_fat_100',5)->nullable();
            $table->string('trans_fat_100',5)->nullable();
            $table->string('monosatured_fat_100',5)->nullable();
            $table->string('polyunsatured_fat_100',5)->nullable();
            $table->string('cholesterol_100',5)->nullable();
            $table->string('total_carbohydrate_100',5)->nullable();
            $table->string('available_carbohydrates_100',5)->nullable();
            $table->string('total_sugars_100',5)->nullable();
            $table->string('sucrose_100',5)->nullable();
            $table->string('lactos_100',5)->nullable();
            $table->string('poliols_100',5)->nullable();
            $table->string('total_dietary_fiber_100',5)->nullable();
            $table->string('soluble_fiber_100',5)->nullable();
            $table->string('insoluble_fiber_100',5)->nullable();
            $table->string('sodium_100',5)->nullable();
            $table->string('energy_serving',5)->nullable();
            $table->string('proteins_serving',5)->nullable();
            $table->string('total_fat_serving',5)->nullable();
            $table->string('satured_fat_serving',5)->nullable();
            $table->string('trans_fat_serving',5)->nullable();
            $table->string('monosatured_fat_serving',5)->nullable();
            $table->string('polyunsatured_fat_serving',5)->nullable();
            $table->string('cholesterol_serving',5)->nullable();
            $table->string('total_carbohydrate_serving',5)->nullable();
            $table->string('available_carbohydrates_serving',5)->nullable();
            $table->string('total_sugars_serving',5)->nullable();
            $table->string('sucrose_serving',5)->nullable();
            $table->string('lactos_serving',5)->nullable();
            $table->string('poliols_serving',5)->nullable();
            $table->string('total_dietary_fiber_serving',5)->nullable();
            $table->string('soluble_fiber_serving',5)->nullable();
            $table->string('insoluble_fiber_serving',5)->nullable();
            $table->string('sodium_serving',5)->nullable();
            $table->string('serving_size_reconstitued',5)->nullable();
            $table->string('servings_per_container_reconstitued',5)->nullable();
            $table->string('energy_100_reconstitued',5)->nullable();
            $table->string('proteins_100_reconstitued',5)->nullable();
            $table->string('total_fat_100_reconstitued',5)->nullable();
            $table->string('satured_fat_100_reconstitued',5)->nullable();
            $table->string('trans_fat_100_reconstitued',5)->nullable();
            $table->string('monosatured_fat_100_reconstitued',5)->nullable();
            $table->string('polyunsatured_fat_100_reconstitued',5)->nullable();
            $table->string('cholesterol_100_reconstitued',5)->nullable();
            $table->string('total_carbohydrate_100_reconstitued',5)->nullable();
            $table->string('available_carbohydrates_100_reconstitued',5)->nullable();
            $table->string('total_sugars_100_reconstitued',5)->nullable();
            $table->string('sucrose_100_reconstitued',5)->nullable();
            $table->string('lactos_100_reconstitued',5)->nullable();
            $table->string('poliols_100_reconstitued',5)->nullable();
            $table->string('total_dietary_fiber_100_reconstitued',5)->nullable();
            $table->string('soluble_fiber_100_reconstitued',5)->nullable();
            $table->string('insoluble_fiber_100_reconstitued',5)->nullable();
            $table->string('sodium_100_reconstitued',5)->nullable();
            $table->string('energy_serving_reconstitued',5)->nullable();
            $table->string('proteins_serving_reconstitued',5)->nullable();
            $table->string('total_fat_serving_reconstitued',5)->nullable();
            $table->string('satured_fat_serving_reconstitued',5)->nullable();
            $table->string('trans_fat_serving_reconstitued',5)->nullable();
            $table->string('monosatured_fat_serving_reconstitued',5)->nullable();
            $table->string('polyunsatured_fat_serving_reconstitued',5)->nullable();
            $table->string('cholesterol_serving_reconstitued',5)->nullable();
            $table->string('total_carbohydrate_serving_reconstitued',5)->nullable();
            $table->string('available_carbohydrates_serving_reconstitued',5)->nullable();
            $table->string('total_sugars_serving_reconstitued',5)->nullable();
            $table->string('sucrose_serving_reconstitued',5)->nullable();
            $table->string('lactos_serving_reconstitued',5)->nullable();
            $table->string('poliols_serving_reconstitued',5)->nullable();
            $table->string('total_dietary_fiber_serving_reconstitued',5)->nullable();
            $table->string('soluble_fiber_serving_reconstitued',5)->nullable();
            $table->string('insoluble_fiber_serving_reconstitued',5)->nullable();
            $table->string('sodium_serving_reconstitued',5)->nullable();
            $table->string('energy_serving_reconstitued_r',5)->nullable();
            $table->string('proteins_serving_reconstitued_r',5)->nullable();
            $table->string('total_fat_serving_reconstitued_r',5)->nullable();
            $table->string('satured_fat_serving_reconstitued_r',5)->nullable();
            $table->string('trans_fat_serving_reconstitued_r',5)->nullable();
            $table->string('monosatured_fat_serving_reconstitued_r',5)->nullable();
            $table->string('polyunsatured_fat_serving_reconstitued_r',5)->nullable();
            $table->string('cholesterol_serving_reconstitued_r',5)->nullable();
            $table->string('total_carbohydrate_serving_reconstitued_r',5)->nullable();
            $table->string('available_carbohydrates_serving_reconstitued_r',5)->nullable();
            $table->string('total_sugars_serving_reconstitued_r',5)->nullable();
            $table->string('sucrose_serving_reconstitued_r',5)->nullable();
            $table->string('lactos_serving_reconstitued_r',5)->nullable();
            $table->string('poliols_serving_reconstitued_r',5)->nullable();
            $table->string('total_dietary_fiber_serving_reconstitued_r',5)->nullable();
            $table->string('soluble_fiber_serving_reconstitued_r',5)->nullable();
            $table->string('insoluble_fiber_serving_reconstitued_r',5)->nullable();
            $table->string('sodium_serving_reconstitued_r',5)->nullable();
            $table->string('vitamin_a_100',5)->nullable();
            $table->string('vitamin_c_100',5)->nullable();
            $table->string('vitamin_d_100',5)->nullable();
            $table->string('vitamin_e_100',5)->nullable();
            $table->string('vitamin_b1_100',5)->nullable();
            $table->string('vitamin_b2_100',5)->nullable();
            $table->string('niacin_100',5)->nullable();
            $table->string('vitamin_b6_100',5)->nullable();
            $table->string('folic_acid_100',5)->nullable();
            $table->string('vitamin_b12_100',5)->nullable();
            $table->string('pantothenic_acid_100',5)->nullable();
            $table->string('biotin_100',5)->nullable();
            $table->string('choline_100',5)->nullable();
            $table->string('vitamin_k_100',5)->nullable();
            $table->string('betacarotene_100',5)->nullable();
            $table->string('calcium_100',5)->nullable();
            $table->string('chromium_100',5)->nullable();
            $table->string('copper_100',5)->nullable();
            $table->string('yodo_100',5)->nullable();
            $table->string('iron_100',5)->nullable();
            $table->string('magnesium_100',5)->nullable();
            $table->string('manganese_100',5)->nullable();
            $table->string('molybdenum_100',5)->nullable();
            $table->string('phosphorus_100',5)->nullable();
            $table->string('zinc_100',5)->nullable();
            $table->string('selenium_100',5)->nullable();
            $table->string('vitamin_a_serving',5)->nullable();
            $table->string('vitamin_c_serving',5)->nullable();
            $table->string('vitamin_d_serving',5)->nullable();
            $table->string('vitamin_e_serving',5)->nullable();
            $table->string('vitamin_b1_serving',5)->nullable();
            $table->string('vitamin_b2_serving',5)->nullable();
            $table->string('niacin_serving',5)->nullable();
            $table->string('vitamin_b6_serving',5)->nullable();
            $table->string('folic_acid_serving',5)->nullable();
            $table->string('vitamin_b12_serving',5)->nullable();
            $table->string('pantothenic_acid_serving',5)->nullable();
            $table->string('biotin_serving',5)->nullable();
            $table->string('choline_serving',5)->nullable();
            $table->string('vitamin_k_serving',5)->nullable();
            $table->string('betacarotene_serving',5)->nullable();
            $table->string('calcium_serving',5)->nullable();
            $table->string('chromium_serving',5)->nullable();
            $table->string('copper_serving',5)->nullable();
            $table->string('yodo_serving',5)->nullable();
            $table->string('iron_serving',5)->nullable();
            $table->string('magnesium_serving',5)->nullable();
            $table->string('manganese_serving',5)->nullable();
            $table->string('molybdenum_serving',5)->nullable();
            $table->string('phosphorus_serving',5)->nullable();
            $table->string('zinc_serving',5)->nullable();
            $table->string('selenium_serving',5)->nullable();
            $table->string('total_aflatoxins',5)->nullable();
            $table->string('aflatoxina_m1',5)->nullable();
            $table->string('zearalenone',5)->nullable();
            $table->string('patulin',5)->nullable();
            $table->string('ochratoxin',5)->nullable();
            $table->string('deoxynivalenol',5)->nullable();
            $table->string('fumonisinas',5)->nullable();
            $table->string('zn',5)->nullable();
            $table->string('pb',5)->nullable();
            $table->string('cd',5)->nullable();
            $table->string('hg',5)->nullable();
            $table->string('sn',5)->nullable();
            $table->string('cu',5)->nullable();
            $table->string('ars',5)->nullable();
            $table->string('se',5)->nullable();
            $table->string('chloramphenicol',5)->nullable();
            $table->string('sulfonamides',5)->nullable();
            $table->string('tetracycline',5)->nullable();
            $table->string('quinolones',5)->nullable();
            $table->string('macrolides',5)->nullable();
            $table->string('betalactams',5)->nullable();
            $table->string('amphenicols',5)->nullable();
            $table->string('steroids',5)->nullable();
            $table->string('zeranol',5)->nullable();
            $table->string('pesticides',5)->nullable();
            $table->string('dioxin_furan',5)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('versiones_productos_solicitud_importados_aca');
    }
};
