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
        Schema::create('productos_solicitud_importados_aca', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('id_solicitud');
            $table->integer('estado_cl')->default(1);
            $table->longText('observacion_solicitud')->nullable();
            $table->date('fecha_cierre')->nullable();
            $table->integer('id_proveedor')->nullable();
            $table->integer('id_seccion')->nullable();
            $table->string('seccion')->nullable();
            $table->integer('sap')->nullable();
            $table->string('product_name', 100)->nullable();
            $table->string('claims_origin', 100)->nullable();
            $table->string('comments', 100)->nullable();
            $table->string('name_organic_certifying_number', 100)->nullable();
            $table->string('plant_number_factory', 100)->nullable();
            $table->string('net_weight', 100)->nullable();
            $table->string('drained_weight', 100)->nullable();
            $table->string('units_x_packaging', 100)->nullable();
            $table->string('country',10)->nullable();
            $table->string('milking_country',10)->nullable();
            $table->string('expiration_date', 100)->nullable();
            $table->string('name_adress_manufacturer', 100)->nullable();
            $table->string('shelf_life', 100)->nullable();
            $table->string('upc_bar_code', 100)->nullable();
            $table->string('storage_conditions', 100)->nullable();
            $table->string('method_preparation', 100)->nullable();
            $table->string('name_supplier', 100)->nullable();
            $table->longText('ingredients')->nullable();
            $table->string('porcent_organic_ingredients', 100)->nullable();
            $table->string('porcent_characterizing_ingredients', 100)->nullable();
            $table->string('quantity_additive', 100)->nullable();
            $table->string('vegetable_oil_fat_used', 100)->nullable();
            $table->string('trans_fats_hydrogenated_origin', 100)->nullable();
            $table->string('spices_herbs_used', 100)->nullable();
            $table->string('quantity_sweetener_per_100_gr_ml', 100)->nullable();
            $table->string('flavourings_aroma_natural_artificial', 100)->nullable();
            $table->string('quantity_x_m_s_g', 100)->nullable()->comment('quantity of xilitol, maltitol, sorbitol, glicerol');
            $table->string('quantity_caffeine', 100)->nullable();
            $table->string('any_extract_used', 100)->nullable();
            $table->string('origin_gelatin', 100)->nullable();
            $table->string('brix_final_product', 100)->nullable();
            $table->string('brix_final_product_without_added_sugar', 100)->nullable();
            $table->string('brix_fruit_greater_proportion_drink', 100)->nullable();
            $table->string('names_colourings', 100)->nullable();
            $table->string('minimum_porcent_cocoa_solids', 100)->nullable();
            $table->string('porcent_cocoa_butter_cocoa_mass', 100)->nullable();
            $table->string('contain_potential_allergens', 2)->nullable();
            $table->string('list_contain_potential_allergens', 100)->nullable();
            $table->string('cereals_gluten', 2)->nullable();
            $table->string('crustacean_products', 2)->nullable();
            $table->string('egg_derivatives', 2)->nullable();
            $table->string('fish_derivatives', 2)->nullable();
            $table->string('peanuts_soy_derivatives', 2)->nullable();
            $table->string('milk_dairy_derivatives', 2)->nullable();
            $table->string('nuts_derivatives', 2)->nullable();
            $table->string('sulfites_derivatives', 2)->nullable();
            $table->string('health_certificate', 2)->nullable();
            $table->string('organic_certification', 2)->nullable();
            $table->string('certification_free_afp', 2)->nullable();
            $table->string('thermograph', 2)->nullable();
            $table->string('gmo_information', 2)->nullable();
            $table->longText('list_gmo_information')->nullable();
            $table->string('total_plate_count', 100)->nullable();
            $table->string('staphylococcus', 100)->nullable();
            $table->string('mold', 100)->nullable();
            $table->string('coliform', 100)->nullable();
            $table->string('clostridium_perfringens', 100)->nullable();
            $table->string('yeast', 100)->nullable();
            $table->string('e_coli', 100)->nullable();
            $table->string('listeria_monocytogenes', 100)->nullable();
            $table->string('salmonella', 100)->nullable();
            $table->string('e_coli_0157_h7', 100)->nullable();
            $table->string('trichinella_spiralis', 100)->nullable();
            $table->string('lactobacillus', 100)->nullable();
            $table->string('campylobacter', 100)->nullable();
            $table->string('enterobacteria', 100)->nullable();
            $table->string('thermophilic_commercial_sterility', 100)->nullable();
            $table->string('bacillus_cereus', 100)->nullable();
            $table->string('ph', 100)->nullable();
            $table->string('porcent_aw', 100)->nullable()->comment('Water Activity %');
            $table->string('type_primary_packaging', 100)->nullable();
            $table->string('type_secundary_packaging', 100)->nullable();
            $table->string('type_controls_sealing_air_tightness_primary_packaging', 100)->nullable();
            $table->string('product_type', 2)->nullable()->comment('Tipo producto (Liquido ml | Solido gr)');
            $table->string('serving_size', 100)->nullable();
            $table->string('servings_per_container', 100)->nullable();
            $table->string('energy_100', 100)->nullable();
            $table->string('proteins_100', 100)->nullable();
            $table->string('total_fat_100', 100)->nullable();
            $table->string('satured_fat_100', 100)->nullable();
            $table->string('trans_fat_100', 100)->nullable();
            $table->string('monosatured_fat_100', 100)->nullable();
            $table->string('polyunsatured_fat_100', 100)->nullable();
            $table->string('cholesterol_100', 100)->nullable();
            $table->string('total_carbohydrate_100', 100)->nullable();
            $table->string('available_carbohydrates_100', 100)->nullable();
            $table->string('total_sugars_100', 100)->nullable();
            $table->string('sucrose_100', 100)->nullable();
            $table->string('lactos_100', 100)->nullable();
            $table->string('poliols_100', 100)->nullable();
            $table->string('total_dietary_fiber_100', 100)->nullable();
            $table->string('soluble_fiber_100', 100)->nullable();
            $table->string('insoluble_fiber_100', 100)->nullable();
            $table->string('sodium_100', 100)->nullable();
            $table->string('energy_serving', 100)->nullable();
            $table->string('proteins_serving', 100)->nullable();
            $table->string('total_fat_serving', 100)->nullable();
            $table->string('satured_fat_serving', 100)->nullable();
            $table->string('trans_fat_serving', 100)->nullable();
            $table->string('monosatured_fat_serving', 100)->nullable();
            $table->string('polyunsatured_fat_serving', 100)->nullable();
            $table->string('cholesterol_serving', 100)->nullable();
            $table->string('total_carbohydrate_serving', 100)->nullable();
            $table->string('available_carbohydrates_serving', 100)->nullable();
            $table->string('total_sugars_serving', 100)->nullable();
            $table->string('sucrose_serving', 100)->nullable();
            $table->string('lactos_serving', 100)->nullable();
            $table->string('poliols_serving', 100)->nullable();
            $table->string('total_dietary_fiber_serving', 100)->nullable();
            $table->string('soluble_fiber_serving', 100)->nullable();
            $table->string('insoluble_fiber_serving', 100)->nullable();
            $table->string('sodium_serving', 100)->nullable();
            $table->string('vitamin_a_100', 100)->nullable();
            $table->string('vitamin_c_100', 100)->nullable();
            $table->string('vitamin_d_100', 100)->nullable();
            $table->string('vitamin_e_100', 100)->nullable();
            $table->string('vitamin_b1_100', 100)->nullable();
            $table->string('vitamin_b2_100', 100)->nullable();
            $table->string('niacin_100', 100)->nullable();
            $table->string('vitamin_b6_100', 100)->nullable();
            $table->string('folic_acid_100', 100)->nullable();
            $table->string('vitamin_b12_100', 100)->nullable();
            $table->string('pantothenic_acid_100', 100)->nullable();
            $table->string('biotin_100', 100)->nullable();
            $table->string('choline_100', 100)->nullable();
            $table->string('vitamin_k_100', 100)->nullable();
            $table->string('betacarotene_100', 100)->nullable();
            $table->string('calcium_100', 100)->nullable();
            $table->string('chromium_100', 100)->nullable();
            $table->string('copper_100', 100)->nullable();
            $table->string('yodo_100', 100)->nullable();
            $table->string('iron_100', 100)->nullable();
            $table->string('magnesium_100', 100)->nullable();
            $table->string('manganese_100', 100)->nullable();
            $table->string('molybdenum_100', 100)->nullable();
            $table->string('phosphorus_100', 100)->nullable();
            $table->string('zinc_100', 100)->nullable();
            $table->string('selenium_100', 100)->nullable();
            $table->string('vitamin_a_serving', 100)->nullable();
            $table->string('vitamin_c_serving', 100)->nullable();
            $table->string('vitamin_d_serving', 100)->nullable();
            $table->string('vitamin_e_serving', 100)->nullable();
            $table->string('vitamin_b1_serving', 100)->nullable();
            $table->string('vitamin_b2_serving', 100)->nullable();
            $table->string('niacin_serving', 100)->nullable();
            $table->string('vitamin_b6_serving', 100)->nullable();
            $table->string('folic_acid_serving', 100)->nullable();
            $table->string('vitamin_b12_serving', 100)->nullable();
            $table->string('pantothenic_acid_serving', 100)->nullable();
            $table->string('biotin_serving', 100)->nullable();
            $table->string('choline_serving', 100)->nullable();
            $table->string('vitamin_k_serving', 100)->nullable();
            $table->string('betacarotene_serving', 100)->nullable();
            $table->string('calcium_serving', 100)->nullable();
            $table->string('chromium_serving', 100)->nullable();
            $table->string('copper_serving', 100)->nullable();
            $table->string('yodo_serving', 100)->nullable();
            $table->string('iron_serving', 100)->nullable();
            $table->string('magnesium_serving', 100)->nullable();
            $table->string('manganese_serving', 100)->nullable();
            $table->string('molybdenum_serving', 100)->nullable();
            $table->string('phosphorus_serving', 100)->nullable();
            $table->string('zinc_serving', 100)->nullable();
            $table->string('selenium_serving', 100)->nullable();
            $table->string('haccp', 2)->nullable();
            $table->string('others_certifications', 2)->nullable();
            $table->longText('total_aflatoxins')->nullable();
            $table->longText('aflatoxina_m1')->nullable();
            $table->longText('zearalenone')->nullable();
            $table->longText('patulin')->nullable();
            $table->longText('ochratoxin')->nullable();
            $table->longText('deoxynivalenol')->nullable();
            $table->longText('fumonisinas')->nullable();
            $table->longText('zn')->nullable();
            $table->longText('pb')->nullable();
            $table->longText('cd')->nullable();
            $table->longText('hg')->nullable();
            $table->longText('sn')->nullable();
            $table->longText('cu')->nullable();
            $table->longText('ars')->nullable();
            $table->longText('se')->nullable();
            $table->longText('chloramphenicol')->nullable();
            $table->longText('tetracycline')->nullable();
            $table->longText('quinolones')->nullable();
            $table->longText('sulfonamides')->nullable();
            $table->longText('pesticides')->nullable();
            $table->longText('dioxin_furan')->nullable();
            $table->longText('esteroides')->nullable();
            $table->string('gluten_free', 2)->nullable();
            $table->string('hidroxianthracene', 2)->nullable();
            $table->string('aloine', 2)->nullable();
            /*$table->longText('year_harvest')->nullable();
            $table->longText('real_alcoholico_degree')->nullable();
            $table->longText('acidity_vinegar')->nullable();
            $table->longText('kcal_100ml')->nullable();
            $table->longText('quantity_carnobic_gas_atmosphere_pressure')->nullable();
            $table->longText('type_packaging')->nullable();            
            $table->longText('density')->nullable();
            $table->longText('degree_alcohol')->nullable();
            $table->longText('dry_extract_densimetry_heavy_grams_per_liter')->nullable();
            $table->longText('reduced_dry_extract_grams_per_liter')->nullable();
            $table->longText('direct_reducing_sugars_grams_per_liter')->nullable();
            $table->longText('invested_reducing_sugars_grams_per_liter')->nullable();
            $table->longText('saccharose_grams_per_liter')->nullable();
            $table->longText('maltose_glucose_grams_per_liter')->nullable();
            $table->longText('dextrin_grams_per_liter')->nullable();
            $table->longText('ashes_grams_per_liter')->nullable();
            $table->longText('alkalinity_ash_gray_grams_per_liter_k2co3')->nullable();
            $table->longText('total_acidity_h2so4_meq_per_liter')->nullable();
            $table->longText('volatile_acidity_c2h4o2_meq_per_liter')->nullable();
            $table->longText('fixed_acidity_h2so4_meq_per_liter')->nullable();
            $table->longText('total_acidity_c4h6o6_tartaric_acid')->nullable();
            $table->longText('total_acidity_c2h4o2_acetic_acid')->nullable();
            $table->longText('total_acidity_c3h6o3_lactic_acid')->nullable();
            $table->longText('total_acidity_c4h6o5_malic_acid')->nullable();
            $table->longText('sulphates_k2so4_grams_per_liter')->nullable();
            $table->longText('sodium_chloride_nacl_grams_per_liter')->nullable();
            $table->longText('sulfurous_anhydride_total_grams_per_liter')->nullable();
            $table->longText('sulfurous_anhydride_free_grams_per_liter')->nullable();
            $table->longText('colourings_matters_strangers')->nullable();
            $table->longText('hybrids')->nullable();
            $table->longText('potassium_ferrocyanide_grams_per_liter')->nullable();
            $table->longText('strange_sweeteners')->nullable();
            $table->longText('relation_alcohol_extract')->nullable();
            $table->longText('sum_alcohol_acid')->nullable();
            $table->longText('equivalent_wine_11_5_degrees')->nullable();
            $table->longText('sodium_benzoate_grams_per_liter')->nullable();
            $table->longText('sorcib_acid_grams_per_liter')->nullable();*/
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos_solicitud_importados_aca');
    }
};
