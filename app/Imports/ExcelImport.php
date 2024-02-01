<?php

namespace App\Imports;

use App\Models\ProductosSolicitudImportadosAca;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ExcelImport implements ToCollection
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
        // Busca el registro existente por ID
        #$rows->get(FILA)[COLUMNA],
        $existingRecord = ProductosSolicitudImportadosAca::find($this->id_producto);
        $existingRecord->update([
            'sap' => $rows->get(11)[2],
            'product_name' => $rows->get(12)[2], // Ajusta las columnas según tus necesidades
            'claims_origin' => $rows->get(13)[2],
            'comments' => $rows->get(14)[2],
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
            'quantity_additive' => $rows->get(33)[2],
            'vegetable_oil_fat_used' => $rows->get(34)[2],
            'trans_fats_hydrogenated_origin' => $rows->get(35)[2],
            'spices_herbs_used' => $rows->get(36)[2],
            'quantity_sweetener_per_100_gr_ml' => $rows->get(37)[2],
            'flavourings_aroma_natural_artificial' => $rows->get(38)[2],
            'quantity_x_m_s_g' => $rows->get(39)[2],
            'quantity_caffeine' => $rows->get(40)[2],
            'any_extract_used' => $rows->get(41)[2],
            'origin_gelatin' => $rows->get(42)[2],
            'brix_final_product' => $rows->get(43)[2],
            'brix_final_product_without_added_sugar' => $rows->get(44)[2],
            'brix_fruit_greater_proportion_drink' => $rows->get(45)[2],
            'names_colourings' => $rows->get(46)[2],
            'minimum_porcent_cocoa_solids' => $rows->get(47)[2],
            'porcent_cocoa_butter_cocoa_mass' => $rows->get(48)[2],
            'contain_potential_allergens' => (!empty($rows->get(56)[2])) ? $rows->get(56)[2] : ((!empty($rows->get(56)[3])) ? $rows->get(56)[3] : null),#$rows->get(56)[2],#$rows->get(56)[3]
            #'list_contain_potential_allergens' => $rows->get(13)[2],
            'cereals_gluten' => (!empty($rows->get(59)[2])) ? $rows->get(59)[2] : ((!empty($rows->get(59)[3])) ? $rows->get(59)[3] : null),#$rows->get(59)[2],#$rows->get(59)[3]
            'crustacean_products' => (!empty($rows->get(60)[2])) ? $rows->get(60)[2] : ((!empty($rows->get(60)[3])) ? $rows->get(60)[3] : null),#$rows->get(60)[2],#$rows->get(60)[3]
            'egg_derivatives' => (!empty($rows->get(61)[2])) ? $rows->get(61)[2] : ((!empty($rows->get(61)[3])) ? $rows->get(61)[3] : null),#$rows->get(61)[2],#$rows->get(61)[3]
            'fish_derivatives' => (!empty($rows->get(62)[2])) ? $rows->get(62)[2] : ((!empty($rows->get(62)[3])) ? $rows->get(62)[3] : null),#$rows->get(62)[2],#$rows->get(62)[3]
            'peanuts_soy_derivatives' => (!empty($rows->get(63)[2])) ? $rows->get(63)[2] : ((!empty($rows->get(63)[3])) ? $rows->get(63)[3] : null),#$rows->get(63)[2],#$rows->get(63)[3]
            'milk_dairy_derivatives' => (!empty($rows->get(64)[2])) ? $rows->get(64)[2] : ((!empty($rows->get(64)[3])) ? $rows->get(64)[3] : null),#$rows->get(64)[2],#$rows->get(64)[3]
            'nuts_derivatives' => (!empty($rows->get(65)[2])) ? $rows->get(65)[2] : ((!empty($rows->get(65)[3])) ? $rows->get(65)[3] : null),#$rows->get(65)[2],#$rows->get(65)[3]
            'sulfites_derivatives' => (!empty($rows->get(66)[2])) ? $rows->get(66)[2] : ((!empty($rows->get(66)[3])) ? $rows->get(66)[3] : null),#$rows->get(66)[2],#$rows->get(66)[3]
            'health_certificate' => (!empty($rows->get(72)[2])) ? $rows->get(72)[2] : ((!empty($rows->get(72)[3])) ? $rows->get(72)[3] : null),#$rows->get(72)[2],#$rows->get(72)[3]
            'organic_certification' => (!empty($rows->get(76)[2])) ? $rows->get(76)[2] : ((!empty($rows->get(76)[3])) ? $rows->get(76)[3] : null),#$rows->get(76)[2],#$rows->get(76)[3]
            'certification_free_afp' => (!empty($rows->get(81)[2])) ? $rows->get(81)[2] : ((!empty($rows->get(81)[3])) ? $rows->get(81)[3] : null),#$rows->get(81)[2],#$rows->get(81)[3]
            'thermograph' => $rows->get(85)[8],
            'gmo_information' => (!empty($rows->get(91)[2])) ? $rows->get(91)[2] : ((!empty($rows->get(91)[3])) ? $rows->get(91)[3] : null),#$rows->get(91)[2],#$rows->get(91)[3]
            #'list_gmo_information' => $rows->get(13)[2],
            'total_plate_count' => $rows->get(98)[1],
            'staphylococcus' => $rows->get(98)[2],
            'mold' => $rows->get(98)[3],
            'coliform' => $rows->get(99)[1],
            'clostridium_perfringens' => $rows->get(99)[2],
            'yeast' => $rows->get(99)[3],
            'e_coli' => $rows->get(100)[1],
            'listeria_monocytogenes' => $rows->get(100)[2],
            'salmonella' => $rows->get(100)[3],
            'e_coli_0157_h7' => $rows->get(101)[1],
            'trichinella_spiralis' => $rows->get(101)[2],
            'lactobacillus' => $rows->get(101)[3],
            'campylobacter' => $rows->get(102)[1],
            'enterobacteria' => $rows->get(102)[2],
            'thermophilic_commercial_sterility' => $rows->get(102)[3],
            'bacillus_cereus' => $rows->get(103)[1],
            'ph' => $rows->get(108)[2],
            'porcent_aw' => $rows->get(109)[2],
            'type_primary_packaging' => $rows->get(113)[2],
            'type_secundary_packaging' => $rows->get(114)[2],
            'type_controls_sealing_air_tightness_primary_packaging' => $rows->get(115)[2],
            'product_type' => $rows->get(120)[5],
            'serving_size' => $rows->get(124)[1],
            'servings_per_container' => $rows->get(125)[1],
            'energy_100' => $rows->get(126)[2],
            'proteins_100' => $rows->get(127)[2],
            'total_fat_100' => $rows->get(128)[2],
            'satured_fat_100' => $rows->get(129)[2],
            'trans_fat_100' => $rows->get(130)[2],
            'monosatured_fat_100' => $rows->get(131)[2],
            'polyunsatured_fat_100' => $rows->get(132)[2],
            'cholesterol_100' => $rows->get(133)[2],
            'total_carbohydrate_100' => $rows->get(134)[2],
            'available_carbohydrates_100' => $rows->get(135)[2],
            'total_sugars_100' => $rows->get(136)[2],
            'sucrose_100' => $rows->get(137)[2],
            'lactos_100' => $rows->get(138)[2],
            'poliols_100' => $rows->get(139)[2],
            'total_dietary_fiber_100' => $rows->get(140)[2],
            'soluble_fiber_100' => $rows->get(141)[2],
            'insoluble_fiber_100' => $rows->get(142)[2],
            'sodium_100' => $rows->get(143)[2],
            'energy_serving' => $rows->get(126)[3],
            'proteins_serving' => $rows->get(127)[3],
            'total_fat_serving' => $rows->get(128)[3],
            'satured_fat_serving' => $rows->get(129)[3],
            'trans_fat_serving' => $rows->get(130)[3],
            'monosatured_fat_serving' => $rows->get(131)[3],
            'polyunsatured_fat_serving' => $rows->get(132)[3],
            'cholesterol_serving' => $rows->get(133)[3],
            'total_carbohydrate_serving' => $rows->get(134)[3],
            'available_carbohydrates_serving' => $rows->get(135)[3],
            'total_sugars_serving' => $rows->get(136)[3],
            'sucrose_serving' => $rows->get(137)[3],
            'lactos_serving' => $rows->get(138)[3],
            'poliols_serving' => $rows->get(139)[3],
            'total_dietary_fiber_serving' => $rows->get(140)[3],
            'soluble_fiber_serving' => $rows->get(141)[3],
            'insoluble_fiber_serving' => $rows->get(142)[3],
            'sodium_serving' => $rows->get(143)[3],
            'vitamin_a_100' => $rows->get(150)[2],
            'vitamin_c_100' => $rows->get(151)[2],
            'vitamin_d_100' => $rows->get(152)[2],
            'vitamin_e_100' => $rows->get(153)[2],
            'vitamin_b1_100' => $rows->get(154)[2],
            'vitamin_b2_100' => $rows->get(155)[2],
            'niacin_100' => $rows->get(156)[2],
            'vitamin_b6_100' => $rows->get(157)[2],
            'folic_acid_100' => $rows->get(158)[2],
            'vitamin_b12_100' => $rows->get(159)[2],
            'pantothenic_acid_100' => $rows->get(160)[2],
            'biotin_100' => $rows->get(161)[2],
            'choline_100' => $rows->get(162)[2],
            'vitamin_k_100' => $rows->get(163)[2],
            'betacarotene_100' => $rows->get(164)[2],
            'calcium_100' => $rows->get(165)[2],
            'chromium_100' => $rows->get(166)[2],
            'copper_100' => $rows->get(167)[2],
            'yodo_100' => $rows->get(168)[2],
            'iron_100' => $rows->get(169)[2],
            'magnesium_100' => $rows->get(170)[2],
            'manganese_100' => $rows->get(171)[2],
            'molybdenum_100' => $rows->get(172)[2],
            'phosphorus_100' => $rows->get(173)[2],
            'zinc_100' => $rows->get(174)[2],
            'selenium_100' => $rows->get(175)[2],
            'vitamin_a_serving' => $rows->get(150)[3],
            'vitamin_c_serving' => $rows->get(151)[3],
            'vitamin_d_serving' => $rows->get(152)[3],
            'vitamin_e_serving' => $rows->get(153)[3],
            'vitamin_b1_serving' => $rows->get(154)[3],
            'vitamin_b2_serving' => $rows->get(155)[3],
            'niacin_serving' => $rows->get(156)[3],
            'vitamin_b6_serving' => $rows->get(157)[3],
            'folic_acid_serving' => $rows->get(158)[3],
            'vitamin_b12_serving' => $rows->get(159)[3],
            'pantothenic_acid_serving' => $rows->get(160)[3],
            'biotin_serving' => $rows->get(161)[3],
            'choline_serving' => $rows->get(162)[3],
            'vitamin_k_serving' => $rows->get(163)[3],
            'betacarotene_serving' => $rows->get(164)[3],
            'calcium_serving' => $rows->get(165)[3],
            'chromium_serving' => $rows->get(166)[3],
            'copper_serving' => $rows->get(167)[3],
            'yodo_serving' => $rows->get(168)[3],
            'iron_serving' => $rows->get(169)[3],
            'magnesium_serving' => $rows->get(170)[3],
            'manganese_serving' => $rows->get(171)[3],
            'molybdenum_serving' => $rows->get(172)[3],
            'phosphorus_serving' => $rows->get(173)[3],
            'zinc_serving' => $rows->get(174)[3],
            'selenium_serving' => $rows->get(175)[3],
            'haccp' => (!empty($rows->get(183)[2])) ? $rows->get(183)[2] : ((!empty($rows->get(183)[3])) ? $rows->get(183)[3] : null),#$rows->get(183)[2],#$rows->get(183)[3]
            'others_certifications' => (!empty($rows->get(187)[2])) ? $rows->get(187)[2] : ((!empty($rows->get(187)[3])) ? $rows->get(187)[3] : null),#$rows->get(187)[2],#$rows->get(187)[2]
            'total_aflatoxins' => $rows->get(193)[1],
            'aflatoxina_m1' => $rows->get(193)[2],
            'zearalenone' => $rows->get(193)[3],
            'patulin' => $rows->get(194)[1],
            'ochratoxin' => $rows->get(194)[2],
            'deoxynivalenol' => $rows->get(194)[3],
            'fumonisinas' => $rows->get(195)[1],
            'zn' => $rows->get(198)[1],
            'pb' => $rows->get(198)[2],
            'cd' => $rows->get(198)[3],
            'hg' => $rows->get(199)[1],
            'sn' => $rows->get(199)[2],
            'cu' => $rows->get(199)[3],
            'ars' => $rows->get(200)[1],
            'se' => $rows->get(200)[2],
            'chloramphenicol' => $rows->get(203)[1],
            'tetracycline' => $rows->get(203)[2],
            'quinolones' => $rows->get(203)[3],
            'sulfonamides' => $rows->get(204)[1],
            'pesticides' => $rows->get(208)[1],
            'dioxin_furan' => $rows->get(210)[1],
            'esteroides' => $rows->get(212)[1],
            'gluten_free' => (!empty($rows->get(219)[2])) ? $rows->get(219)[2] : ((!empty($rows->get(219)[3])) ? $rows->get(219)[3] : null),#$rows->get(219)[2],#$rows->get(219)[3]
            'hidroxianthracene' => (!empty($rows->get(223)[2])) ? $rows->get(223)[2] : ((!empty($rows->get(223)[3])) ? $rows->get(223)[3] : null),#$rows->get(223)[2],#$rows->get(223)[3]
            'aloine' => (!empty($rows->get(227)[2])) ? $rows->get(227)[2] : ((!empty($rows->get(227)[3])) ? $rows->get(227)[3] : null),#$rows->get(227)[2],#$rows->get(227)[3]
        ]);
    }
}
