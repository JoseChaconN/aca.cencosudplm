<?php

namespace App\Imports;
use App\Models\ProductosSolicitudImportadosAca;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class FichaTecnicaProductosImportadosImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    protected $request;
    protected $ficha_excel;
    protected $id_producto;

    public function __construct($request, $ficha_excel, $id_producto)
    {
        $this->request = $request;
        $this->ficha_excel = $ficha_excel;
        $this->id_producto = $id_producto;
    }
    public function collection(Collection $rows)
    {
        //
        $existingRecord = ProductosSolicitudImportadosAca::find($this->id_producto);
        $serving_size= explode(':',$rows->get(157)[1]);
        $servings_per_container= explode(':',$rows->get(158)[1]);

        $serving_size_reconstitued= explode(':',$rows->get(187)[1]);
        $servings_per_container_reconstitued= explode(':',$rows->get(188)[1]);
        // Buscar la letra 'G' o el substring 'GR'
        $product_type = $rows->get(157)[2];
        if (stripos($product_type, 'G') !== false || stripos($product_type, 'GR') !== false) {
            // Si la letra 'G' o el substring 'GR' están presentes, hacer algo
            #echo 'La variable contiene la letra G o el substring GR';
            $product_type = 'gr';
        }

        // Buscar el substring 'ML'
        if (stripos($product_type, 'ML') !== false) {
            // Si el substring 'ML' está presente, hacer otra cosa
            #echo 'La variable contiene el substring ML';
            $product_type = 'ml';
        }
        $existingRecord->update([
            #PRIMERA PARTE
                'sap' => $rows->get(11)[2],
                'product_name' => $rows->get(12)[2],
                'product_name_spanish' => $rows->get(13)[2],
                'claims_origin' => $rows->get(14)[2],
                'comments' => $rows->get(15)[2],
                'name_organic_certifying_number' => $rows->get(16)[2],
                'plant_number_factory' => $rows->get(17)[2],
                'net_weight' => $rows->get(18)[2],
                'drained_weight' => $rows->get(19)[2],
                'units_x_packaging' => $rows->get(20)[2],
                'country' => $rows->get(21)[2],
                'milking_country' => $rows->get(22)[2],
                'expiration_date' => $rows->get(23)[2],
                'name_adress_manufacturer' => $rows->get(24)[2],
                'shelf_life' => $rows->get(25)[2],
                'upc_bar_code' => $rows->get(26)[2],
                'storage_conditions' => $rows->get(27)[2],
                'method_preparation' => $rows->get(28)[2],
                'name_supplier' => $rows->get(29)[2],
                'ingredients' => $rows->get(30)[2],
                'porcent_organic_ingredients' => $rows->get(31)[2],
                'porcent_characterizing_ingredients' => $rows->get(32)[2],
                'name_additive' => $rows->get(33)[2],#NUEVO CAMPO
                'porcent_additive' => $rows->get(34)[2],#NUEVO CAMPO
                'quantity_additive' => $rows->get(35)[2],
                'indicate_additive_code' =>  $rows->get(36)[2],#NUEVO CAMPO
                'indicate_additive_functionality' => $rows->get(37)[2],#NUEVO CAMPO
                'vegetable_oil_fat_used' => $rows->get(38)[2],
                'trans_fats_hydrogenated_origin' => $rows->get(39)[2],
                'spices_herbs_used' => $rows->get(40)[2],
                'quantity_sweetener_per_100_gr_ml' => $rows->get(41)[2],
                'flavourings_aroma_natural_artificial' => $rows->get(42)[2],
                'quantity_x_m_s_g' => $rows->get(43)[2],
                'quantity_caffeine' => $rows->get(44)[2],
                'any_extract_used' => $rows->get(45)[2],
                'origin_gelatin' => $rows->get(46)[2],
                'brix_final_product' => $rows->get(47)[2],
                'brix_final_product_without_added_sugar' => $rows->get(48)[2],
                'brix_fruit_greater_proportion_drink' => $rows->get(49)[2],
                'names_colourings' => $rows->get(50)[2],
                'minimum_porcent_cocoa_solids' => $rows->get(51)[2],
                'porcent_cocoa_butter_cocoa_mass' => $rows->get(52)[2],
            #SEGUNDA PARTE
                'contain_potential_allergens' => (!empty($rows->get(60)[2])) ? $rows->get(60)[2] : ((!empty($rows->get(60)[3])) ? $rows->get(60)[3] : null),
                #'list_contain_potential_allergens' => $rows->get(13)[2],
                'cereals_gluten' => (!empty($rows->get(63)[2])) ? $rows->get(63)[2] : ((!empty($rows->get(63)[3])) ? $rows->get(63)[3] : null),
                'crustacean_products' => (!empty($rows->get(64)[2])) ? $rows->get(64)[2] : ((!empty($rows->get(64)[3])) ? $rows->get(64)[3] : null),
                'egg_derivatives' => (!empty($rows->get(65)[2])) ? $rows->get(65)[2] : ((!empty($rows->get(65)[3])) ? $rows->get(65)[3] : null),
                'fish_derivatives' => (!empty($rows->get(66)[2])) ? $rows->get(66)[2] : ((!empty($rows->get(66)[3])) ? $rows->get(66)[3] : null),
                'peanuts_soy_derivatives' => (!empty($rows->get(67)[2])) ? $rows->get(67)[2] : ((!empty($rows->get(67)[3])) ? $rows->get(67)[3] : null),
                'milk_dairy_derivatives' => (!empty($rows->get(68)[2])) ? $rows->get(68)[2] : ((!empty($rows->get(68)[3])) ? $rows->get(68)[3] : null),
                'nuts_derivatives' => (!empty($rows->get(69)[2])) ? $rows->get(69)[2] : ((!empty($rows->get(69)[3])) ? $rows->get(69)[3] : null),
                'sulfites_derivatives' => (!empty($rows->get(70)[2])) ? $rows->get(70)[2] : ((!empty($rows->get(70)[3])) ? $rows->get(70)[3] : null),
            #TERCERA PARTE
                #'health_certificate' => (!empty($rows->get(72)[2])) ? $rows->get(72)[2] : ((!empty($rows->get(72)[3])) ? $rows->get(72)[3] : null),
                #'organic_certification' => (!empty($rows->get(76)[2])) ? $rows->get(76)[2] : ((!empty($rows->get(76)[3])) ? $rows->get(76)[3] : null),
                #'certification_free_afp' => (!empty($rows->get(81)[2])) ? $rows->get(81)[2] : ((!empty($rows->get(81)[3])) ? $rows->get(81)[3] : null),
            #CUARTA PARTE
                #'thermograph' => $rows->get(85)[8],
                'total_plate_count' => $rows->get(115)[2],
                'coliform' => $rows->get(116)[2],
                'e_coli' => $rows->get(117)[2],
                'e_coli_100' => $rows->get(118)[2],#NUEVO CAMPO
                'e_coli_0157_h7' => $rows->get(119)[2],
                'campylobacter' => $rows->get(120)[2],
                'bacillus_cereus' => $rows->get(121)[2],               
                'staphylococcus' => $rows->get(122)[2],
                'clostridium_perfringens' => $rows->get(123)[2],
                'listeria_monocytogenes' => $rows->get(124)[2],
                'enterobacteria' => $rows->get(125)[2],
                'mold' => $rows->get(126)[2],
                'yeast' => $rows->get(127)[2],
                'mold_count' => $rows->get(128)[2],#NUEVO CAMPO
                'yeast_count' => $rows->get(129)[2],#NUEVO CAMPO
                #'salmonella' => $rows->get(123)[3],#ELIMINAR CAMPO
                'salmonella_25' => $rows->get(130)[2],#NUEVO CAMPO
                'salmonella_50' => $rows->get(131)[2],#NUEVO CAMPO
                'lactobacillus' => $rows->get(132)[2],
                'aerobic_anaerobic_mesophilic_microorganisms' => $rows->get(133)[2],#NUEVO CAMPO
                'aerobic_anaerobic_thermophilic_microorganisms' => $rows->get(134)[2],#NUEVO CAMPO
                'thermophilic_commercial_sterility' => $rows->get(135)[2],
                'anaerobic_spores_reducing_sulfites' => $rows->get(136)[2],#NUEVO CAMPO
                'cronobacter_10g' => $rows->get(137)[2],#NUEVO CAMPO
            #QUINTA PARTE
                'ph' => $rows->get(141)[2],
                'porcent_aw' => $rows->get(143)[2],
                #'gmo_information' => (!empty($rows->get(91)[2])) ? $rows->get(91)[2] : ((!empty($rows->get(91)[3])) ? $rows->get(91)[3] : null),
                #'list_gmo_information' => $rows->get(13)[2],
            #SEXTA PARTE
                'type_primary_packaging' => $rows->get(146)[2],
                'type_secundary_packaging' => $rows->get(147)[2],
                'type_controls_sealing_air_tightness_primary_packaging' => $rows->get(148)[2],

            #NOVENA PARTE
                'product_type' => $product_type,
                'serving_size' => $serving_size[1],
                'servings_per_container' => $servings_per_container[1],
                'energy_100' => $rows->get(159)[2],
                'proteins_100' => $rows->get(160)[2],
                'total_fat_100' => $rows->get(161)[2],
                'satured_fat_100' => $rows->get(162)[2],
                'trans_fat_100' => $rows->get(163)[2],
                'monosatured_fat_100' => $rows->get(164)[2],
                'polyunsatured_fat_100' => $rows->get(165)[2],
                'cholesterol_100' => $rows->get(166)[2],
                'total_carbohydrate_100' => $rows->get(167)[2],
                'available_carbohydrates_100' => $rows->get(168)[2],
                'total_sugars_100' => $rows->get(169)[2],
                'sucrose_100' => $rows->get(170)[2],
                'lactos_100' => $rows->get(171)[2],
                'poliols_100' => $rows->get(172)[2],
                'total_dietary_fiber_100' => $rows->get(173)[2],
                'soluble_fiber_100' => $rows->get(174)[2],
                'insoluble_fiber_100' => $rows->get(175)[2],
                'sodium_100' => $rows->get(176)[2],
                'energy_serving' => $rows->get(159)[3],
                'proteins_serving' => $rows->get(160)[3],
                'total_fat_serving' => $rows->get(161)[3],
                'satured_fat_serving' => $rows->get(162)[3],
                'trans_fat_serving' => $rows->get(163)[3],
                'monosatured_fat_serving' => $rows->get(164)[3],
                'polyunsatured_fat_serving' => $rows->get(165)[3],
                'cholesterol_serving' => $rows->get(166)[3],
                'total_carbohydrate_serving' => $rows->get(167)[3],
                'available_carbohydrates_serving' => $rows->get(168)[3],
                'total_sugars_serving' => $rows->get(169)[3],
                'sucrose_serving' => $rows->get(170)[3],
                'lactos_serving' => $rows->get(171)[3],
                'poliols_serving' => $rows->get(172)[3],
                'total_dietary_fiber_serving' => $rows->get(173)[3],
                'soluble_fiber_serving' => $rows->get(174)[3],
                'insoluble_fiber_serving' => $rows->get(175)[3],
                'sodium_serving' => $rows->get(176)[3],
            #NOVENA PARTE 2
                'serving_size_reconstitued' => $serving_size_reconstitued[1],#NUVA COLUMNA
                'servings_per_container_reconstitued' => $servings_per_container_reconstitued[1],#NUVA COLUMNA
                'energy_100_reconstitued' => $rows->get(189)[2],#NUEVA COLUMNA
                'proteins_100_reconstitued' => $rows->get(190)[2],#NUEVA COLUMNA
                'total_fat_100_reconstitued' => $rows->get(191)[2],#NUEVA COLUMNA
                'satured_fat_100_reconstitued' => $rows->get(192)[2],#NUEVA COLUMNA
                'trans_fat_100_reconstitued' => $rows->get(193)[2],#NUEVA COLUMNA
                'monosatured_fat_100_reconstitued' => $rows->get(194)[2],#NUEVA COLUMNA
                'polyunsatured_fat_100_reconstitued' => $rows->get(195)[2],#NUEVA COLUMNA
                'cholesterol_100_reconstitued' => $rows->get(196)[2],#NUEVA COLUMNA
                'total_carbohydrate_100_reconstitued' => $rows->get(197)[2],#NUEVA COLUMNA
                'available_carbohydrates_100_reconstitued' => $rows->get(198)[2],#NUEVA COLUMNA
                'total_sugars_100_reconstitued' => $rows->get(199)[2],#NUEVA COLUMNA
                'sucrose_100_reconstitued' => $rows->get(200)[2],#NUEVA COLUMNA
                'lactos_100_reconstitued' => $rows->get(201)[2],#NUEVA COLUMNA
                'poliols_100_reconstitued' => $rows->get(202)[2],#NUEVA COLUMNA
                'total_dietary_fiber_100_reconstitued' => $rows->get(203)[2],#NUEVA COLUMNA
                'soluble_fiber_100_reconstitued' => $rows->get(204)[2],#NUEVA COLUMNA
                'insoluble_fiber_100_reconstitued' => $rows->get(205)[2],#NUEVA COLUMNA
                'sodium_100_reconstitued' => $rows->get(206)[2],#NUEVA COLUMNA
                'energy_serving_reconstitued' => $rows->get(189)[3],#NUEVA COLUMNA
                'proteins_serving_reconstitued' => $rows->get(190)[3],#NUEVA COLUMNA
                'total_fat_serving_reconstitued' => $rows->get(191)[3],#NUEVA COLUMNA
                'satured_fat_serving_reconstitued' => $rows->get(192)[3],#NUEVA COLUMNA
                'trans_fat_serving_reconstitued' => $rows->get(193)[3],#NUEVA COLUMNA
                'monosatured_fat_serving_reconstitued' => $rows->get(194)[3],#NUEVA COLUMNA
                'polyunsatured_fat_serving_reconstitued' => $rows->get(195)[3],#NUEVA COLUMNA
                'cholesterol_serving_reconstitued' => $rows->get(196)[3],#NUEVA COLUMNA
                'total_carbohydrate_serving_reconstitued' => $rows->get(197)[3],#NUEVA COLUMNA
                'available_carbohydrates_serving_reconstitued' => $rows->get(198)[3],#NUEVA COLUMNA
                'total_sugars_serving_reconstitued' => $rows->get(199)[3],#NUEVA COLUMNA
                'sucrose_serving_reconstitued' => $rows->get(200)[3],#NUEVA COLUMNA
                'lactos_serving_reconstitued' => $rows->get(201)[3],#NUEVA COLUMNA
                'poliols_serving_reconstitued' => $rows->get(202)[3],#NUEVA COLUMNA
                'total_dietary_fiber_serving_reconstitued' => $rows->get(203)[3],#NUEVA COLUMNA
                'soluble_fiber_serving_reconstitued' => $rows->get(204)[3],#NUEVA COLUMNA
                'insoluble_fiber_serving_reconstitued' => $rows->get(205)[3],#NUEVA COLUMNA
                'sodium_serving_reconstitued' => $rows->get(206)[3],#NUEVA COLUMNA
                'energy_serving_reconstitued_r' => $rows->get(189)[4],#NUEVA COLUMNA
                'proteins_serving_reconstitued_r' => $rows->get(190)[4],#NUEVA COLUMNA
                'total_fat_serving_reconstitued_r' => $rows->get(191)[4],#NUEVA COLUMNA
                'satured_fat_serving_reconstitued_r' => $rows->get(192)[4],#NUEVA COLUMNA
                'trans_fat_serving_reconstitued_r' => $rows->get(193)[4],#NUEVA COLUMNA
                'monosatured_fat_serving_reconstitued_r' => $rows->get(194)[4],#NUEVA COLUMNA
                'polyunsatured_fat_serving_reconstitued_r' => $rows->get(195)[4],#NUEVA COLUMNA
                'cholesterol_serving_reconstitued_r' => $rows->get(196)[4],#NUEVA COLUMNA
                'total_carbohydrate_serving_reconstitued_r' => $rows->get(197)[4],#NUEVA COLUMNA
                'available_carbohydrates_serving_reconstitued_r' => $rows->get(198)[4],#NUEVA COLUMNA
                'total_sugars_serving_reconstitued_r' => $rows->get(199)[4],#NUEVA COLUMNA
                'sucrose_serving_reconstitued_r' => $rows->get(200)[4],#NUEVA COLUMNA
                'lactos_serving_reconstitued_r' => $rows->get(201)[4],#NUEVA COLUMNA
                'poliols_serving_reconstitued_r' => $rows->get(202)[4],#NUEVA COLUMNA
                'total_dietary_fiber_serving_reconstitued_r' => $rows->get(203)[4],#NUEVA COLUMNA
                'soluble_fiber_serving_reconstitued_r' => $rows->get(204)[4],#NUEVA COLUMNA
                'insoluble_fiber_serving_reconstitued_r' => $rows->get(205)[4],#NUEVA COLUMNA
                'sodium_serving_reconstitued_r' => $rows->get(206)[4],#NUEVA COLUMNA
            #DECIMA PARTE
                'vitamin_a_100' => $rows->get(213)[2],
                'vitamin_c_100' => $rows->get(214)[2],
                'vitamin_d_100' => $rows->get(215)[2],
                'vitamin_e_100' => $rows->get(216)[2],
                'vitamin_b1_100' => $rows->get(217)[2],
                'vitamin_b2_100' => $rows->get(218)[2],
                'niacin_100' => $rows->get(219)[2],
                'vitamin_b6_100' => $rows->get(220)[2],
                'folic_acid_100' => $rows->get(221)[2],
                'vitamin_b12_100' => $rows->get(222)[2],
                'pantothenic_acid_100' => $rows->get(223)[2],
                'biotin_100' => $rows->get(224)[2],
                'choline_100' => $rows->get(225)[2],
                'vitamin_k_100' => $rows->get(226)[2],
                'betacarotene_100' => $rows->get(227)[2],
                'calcium_100' => $rows->get(229)[2],
                'chromium_100' => $rows->get(230)[2],
                'copper_100' => $rows->get(231)[2],
                'yodo_100' => $rows->get(232)[2],
                'iron_100' => $rows->get(233)[2],
                'magnesium_100' => $rows->get(234)[2],
                'manganese_100' => $rows->get(235)[2],
                'molybdenum_100' => $rows->get(236)[2],
                'phosphorus_100' => $rows->get(237)[2],
                'zinc_100' => $rows->get(238)[2],
                'selenium_100' => $rows->get(239)[2],
                'vitamin_a_serving' => $rows->get(213)[3],
                'vitamin_c_serving' => $rows->get(214)[3],
                'vitamin_d_serving' => $rows->get(215)[3],
                'vitamin_e_serving' => $rows->get(216)[3],
                'vitamin_b1_serving' => $rows->get(217)[3],
                'vitamin_b2_serving' => $rows->get(218)[3],
                'niacin_serving' => $rows->get(219)[3],
                'vitamin_b6_serving' => $rows->get(220)[3],
                'folic_acid_serving' => $rows->get(221)[3],
                'vitamin_b12_serving' => $rows->get(222)[3],
                'pantothenic_acid_serving' => $rows->get(223)[3],
                'biotin_serving' => $rows->get(224)[3],
                'choline_serving' => $rows->get(225)[3],
                'vitamin_k_serving' => $rows->get(226)[3],
                'betacarotene_serving' => $rows->get(227)[3],
                'calcium_serving' => $rows->get(229)[3],
                'chromium_serving' => $rows->get(230)[3],
                'copper_serving' => $rows->get(231)[3],
                'yodo_serving' => $rows->get(232)[3],
                'iron_serving' => $rows->get(233)[3],
                'magnesium_serving' => $rows->get(234)[3],
                'manganese_serving' => $rows->get(235)[3],
                'molybdenum_serving' => $rows->get(236)[3],
                'phosphorus_serving' => $rows->get(237)[3],
                'zinc_serving' => $rows->get(238)[3],
                'selenium_serving' => $rows->get(239)[3],

                #ONCEAVA PARTE
                    'total_aflatoxins' => $rows->get(247)[2],
                    'aflatoxina_m1' => $rows->get(248)[2],
                    'zearalenone' => $rows->get(249)[2],
                    'patulin' => $rows->get(250)[2],
                    'ochratoxin' => $rows->get(251)[2],
                    'deoxynivalenol' => $rows->get(252)[2],
                    'fumonisinas' => $rows->get(253)[2],
                    'zn' => $rows->get(256)[2],
                    'pb' => $rows->get(257)[2],
                    'cd' => $rows->get(258)[2],
                    'hg' => $rows->get(259)[2],
                    'sn' => $rows->get(260)[2],
                    'cu' => $rows->get(261)[2],
                    'ars' => $rows->get(262)[2],
                    'se' => $rows->get(263)[2],
                    'chloramphenicol' => $rows->get(266)[2],
                    'sulfonamides' => $rows->get(267)[2],
                    'tetracycline' => $rows->get(268)[2],
                    'quinolones' => $rows->get(269)[2],
                    'macrolides' => $rows->get(270)[2],
                    'betalactams' => $rows->get(271)[2],
                    'amphenicols' => $rows->get(272)[2],
                    'steroids' => $rows->get(273)[2],
                    'zeranol' => $rows->get(274)[2],
                    'pesticides' => $rows->get(275)[2],
                    'dioxin_furan' => $rows->get(276)[2],
        ]);
    }
}
