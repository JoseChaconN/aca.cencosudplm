<?php

namespace App\Imports;
use App\Models\ProductosSolicitudImportadosAca;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Str;

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
        $home_measure = explode(':',$rows->get(156)[1]);
        $serving_size_a = explode(':',$rows->get(157)[1]);#explode(':',$rows->get(157)[1]);
        // Buscar el número en la cadena
        preg_match('/(\d+)/', $serving_size_a[1], $serving_size);
        // Obtener el número de las coincidencias
        $serving_size = $serving_size[0];
        // Convertir el número de cadena a entero
        $serving_size = intval($serving_size);

        $servings_per_container = explode(':',$rows->get(158)[1]);
        $serving_size_reconstitued_a= explode(':',$rows->get(188)[1]);
        // Buscar el número en la cadena
        preg_match('/(\d+)/', $serving_size_reconstitued_a[1], $serving_size_reconstitued);
        // Obtener el número de las coincidencias
        $serving_size_reconstitued = $serving_size_reconstitued[0];
        // Convertir el número de cadena a entero
        $serving_size_reconstitued = intval($serving_size_reconstitued);

        $servings_per_container_reconstitued= explode(':',$rows->get(189)[1]);
        // Buscar la letra 'G' o el substring 'GR'
        $product_type = $rows->get(157)[1];
        if (stripos($product_type, 'G') !== false || stripos($product_type, 'GR') !== false) {
            $product_type = 'gr';
        }
        // Buscar el substring 'ML'
        if (stripos($product_type, 'ML') !== false) {
            $product_type = 'ml';
        }
        
        #$servings_per_container
        /////CALCULO DE TABLA NUTRICIONAL///////////
            $energy_100 = $rows->get(159)[2];
            $proteins_100 = $rows->get(160)[2];
            $total_fat_100 = $rows->get(161)[2];
            $satured_fat_100 = $rows->get(162)[2];
            $trans_fat_100 = $rows->get(163)[2];
            $monosatured_fat_100 = $rows->get(164)[2];
            $polyunsatured_fat_100 = $rows->get(165)[2];
            $cholesterol_100 = $rows->get(166)[2];
            $total_carbohydrate_100 = $rows->get(167)[2];
            $available_carbohydrates_100 = $rows->get(168)[2];
            $total_sugars_100 = $rows->get(169)[2];
            $sucrose_100 = $rows->get(170)[2];
            $lactos_100 = $rows->get(171)[2];
            $poliols_100 = $rows->get(172)[2];
            $total_dietary_fiber_100 = $rows->get(173)[2];
            $soluble_fiber_100 = $rows->get(174)[2];
            $insoluble_fiber_100 = $rows->get(175)[2];
            $sodium_100 = $rows->get(176)[2];
            $energy_serving = $rows->get(159)[3];
            $proteins_serving = $rows->get(160)[3];
            $total_fat_serving = $rows->get(161)[3];
            $satured_fat_serving = $rows->get(162)[3];
            $trans_fat_serving = $rows->get(163)[3];
            $monosatured_fat_serving = $rows->get(164)[3];
            $polyunsatured_fat_serving = $rows->get(165)[3];
            $cholesterol_serving = $rows->get(166)[3];
            $total_carbohydrate_serving = $rows->get(167)[3];
            $available_carbohydrates_serving = $rows->get(168)[3];
            $total_sugars_serving = $rows->get(169)[3];
            $sucrose_serving = $rows->get(170)[3];
            $lactos_serving = $rows->get(171)[3];
            $poliols_serving = $rows->get(172)[3];
            $total_dietary_fiber_serving = $rows->get(173)[3];
            $soluble_fiber_serving = $rows->get(174)[3];
            $insoluble_fiber_serving = $rows->get(175)[3];
            $sodium_serving = $rows->get(176)[3];

            $vitamin_a_100 = $rows->get(214)[2];
            $vitamin_c_100 = $rows->get(215)[2];
            $vitamin_d_100 = $rows->get(216)[2];
            $vitamin_e_100 = $rows->get(217)[2];
            $vitamin_b1_100 = $rows->get(218)[2];
            $vitamin_b2_100 = $rows->get(219)[2];
            $niacin_100 = $rows->get(220)[2];
            $vitamin_b6_100 = $rows->get(221)[2];
            $folic_acid_100 = $rows->get(222)[2];
            $vitamin_b12_100 = $rows->get(223)[2];
            $pantothenic_acid_100 = $rows->get(224)[2];
            $biotin_100 = $rows->get(225)[2];
            $choline_100 = $rows->get(226)[2];
            $vitamin_k_100 = $rows->get(227)[2];
            $betacarotene_100 = $rows->get(228)[2];
            $calcium_100 = $rows->get(220)[2];
            $chromium_100 = $rows->get(231)[2];
            $copper_100 = $rows->get(232)[2];
            $yodo_100 = $rows->get(233)[2];
            $iron_100 = $rows->get(234)[2];
            $magnesium_100 = $rows->get(235)[2];
            $manganese_100 = $rows->get(236)[2];
            $molybdenum_100 = $rows->get(237)[2];
            $phosphorus_100 = $rows->get(238)[2];
            $zinc_100 = $rows->get(239)[2];
            $selenium_100 = $rows->get(240)[2];
            $vitamin_a_serving = $rows->get(214)[3];
            $vitamin_c_serving = $rows->get(215)[3];
            $vitamin_d_serving = $rows->get(216)[3];
            $vitamin_e_serving = $rows->get(217)[3];
            $vitamin_b1_serving = $rows->get(218)[3];
            $vitamin_b2_serving = $rows->get(219)[3];
            $niacin_serving = $rows->get(220)[3];
            $vitamin_b6_serving = $rows->get(221)[3];
            $folic_acid_serving = $rows->get(222)[3];
            $vitamin_b12_serving = $rows->get(223)[3];
            $pantothenic_acid_serving = $rows->get(224)[3];
            $biotin_serving = $rows->get(225)[3];
            $choline_serving = $rows->get(226)[3];
            $vitamin_k_serving = $rows->get(227)[3];
            $betacarotene_serving = $rows->get(228)[3];
            $calcium_serving = $rows->get(220)[3];
            $chromium_serving = $rows->get(231)[3];
            $copper_serving = $rows->get(232)[3];
            $yodo_serving = $rows->get(233)[3];
            $iron_serving = $rows->get(234)[3];
            $magnesium_serving = $rows->get(235)[3];
            $manganese_serving = $rows->get(236)[3];
            $molybdenum_serving = $rows->get(237)[3];
            $phosphorus_serving = $rows->get(238)[3];
            $zinc_serving = $rows->get(239)[3];
            $selenium_serving = $rows->get(240)[3];
            if($serving_size > 0){
                #TABLA NUTRICIONAL
                $energy_100_c = (empty($energy_100) && !empty($energy_serving)) ? $energy_serving*100/$serving_size : (!empty($energy_100) ? $energy_100 : NULL);
                $energy_serving_c = (empty($energy_serving) && !empty($energy_100)) ? $energy_100*$serving_size/100 : (!empty($energy_serving) ? $energy_serving : NULL);
                $proteins_100_c = (empty($proteins_100) && !empty($proteins_serving)) ? $proteins_serving*100/$serving_size : (!empty($proteins_100) ? $proteins_100 : NULL);
                $proteins_serving_c = (empty($proteins_serving) && !empty($proteins_100)) ? $proteins_100*$serving_size/100 : (!empty($proteins_serving) ? $proteins_serving : NULL);
                $total_fat_100_c = (empty($total_fat_100) && !empty($total_fat_serving)) ? $total_fat_serving*100/$serving_size : (!empty($total_fat_100) ? $total_fat_100 : NULL);
                $total_fat_serving_c = (empty($total_fat_serving) && !empty($total_fat_100)) ? $total_fat_100*$serving_size/100 : (!empty($total_fat_serving) ? $total_fat_serving : NULL);
                $satured_fat_100_c = (empty($satured_fat_100) && !empty($satured_fat_serving)) ? $satured_fat_serving*100/$serving_size : (!empty($satured_fat_100) ? $satured_fat_100 : NULL);
                $satured_fat_serving_c = (empty($satured_fat_serving) && !empty($satured_fat_100)) ? $satured_fat_100*$serving_size/100 : (!empty($satured_fat_serving) ? $satured_fat_serving : NULL);
                $trans_fat_100_c = (empty($trans_fat_100) && !empty($trans_fat_serving)) ? $trans_fat_serving*100/$serving_size : (!empty($trans_fat_100) ? $trans_fat_100 : NULL);
                $trans_fat_serving_c = (empty($trans_fat_serving) && !empty($trans_fat_100)) ? $trans_fat_100*$serving_size/100 : (!empty($trans_fat_serving) ? $trans_fat_serving : NULL);
                $monosatured_fat_100_c = (empty($monosatured_fat_100) && !empty($monosatured_fat_serving)) ? $monosatured_fat_serving*100/$serving_size : (!empty($monosatured_fat_100) ? $monosatured_fat_100 : NULL);
                $monosatured_fat_serving_c = (empty($monosatured_fat_serving) && !empty($monosatured_fat_100)) ? $monosatured_fat_100*$serving_size/100 : (!empty($monosatured_fat_serving) ? $monosatured_fat_serving : NULL);
                $polyunsatured_fat_100_c = (empty($polyunsatured_fat_100) && !empty($polyunsatured_fat_serving)) ? $polyunsatured_fat_serving*100/$serving_size : (!empty($polyunsatured_fat_100) ? $polyunsatured_fat_100 : NULL);
                $polyunsatured_fat_serving_c = (empty($polyunsatured_fat_serving) && !empty($polyunsatured_fat_100)) ? $polyunsatured_fat_100*$serving_size/100 : (!empty($polyunsatured_fat_serving) ? $polyunsatured_fat_serving : NULL);
                $cholesterol_100_c = (empty($cholesterol_100) && !empty($cholesterol_serving)) ? $cholesterol_serving*100/$serving_size : (!empty($cholesterol_100) ? $cholesterol_100 : NULL);
                $cholesterol_serving_c = (empty($cholesterol_serving) && !empty($cholesterol_100)) ? $cholesterol_100*$serving_size/100 : (!empty($cholesterol_serving) ? $cholesterol_serving : NULL);
                $total_carbohydrate_100_c = (empty($total_carbohydrate_100) && !empty($total_carbohydrate_serving)) ? $total_carbohydrate_serving*100/$serving_size : (!empty($total_carbohydrate_100) ? $total_carbohydrate_100 : NULL);
                $total_carbohydrate_serving_c = (empty($total_carbohydrate_serving) && !empty($total_carbohydrate_100)) ? $total_carbohydrate_100*$serving_size/100 : (!empty($total_carbohydrate_serving) ? $total_carbohydrate_serving : NULL);
                $available_carbohydrates_100_c = (empty($available_carbohydrates_100) && !empty($available_carbohydrates_serving)) ? $available_carbohydrates_serving*100/$serving_size : (!empty($available_carbohydrates_100) ? $available_carbohydrates_100 : NULL);
                $available_carbohydrates_serving_c = (empty($available_carbohydrates_serving) && !empty($available_carbohydrates_100)) ? $available_carbohydrates_100*$serving_size/100 : (!empty($available_carbohydrates_serving) ? $available_carbohydrates_serving : NULL);
                $total_sugars_100_c = (empty($total_sugars_100) && !empty($total_sugars_serving)) ? $total_sugars_serving*100/$serving_size : (!empty($total_sugars_100) ? $total_sugars_100 : NULL);
                $total_sugars_serving_c = (empty($total_sugars_serving) && !empty($total_sugars_100)) ? $total_sugars_100*$serving_size/100 : (!empty($total_sugars_serving) ? $total_sugars_serving : NULL);
                $sucrose_100_c = (empty($sucrose_100) && !empty($sucrose_serving)) ? $sucrose_serving*100/$serving_size : (!empty($sucrose_100) ? $sucrose_100 : NULL);
                $sucrose_serving_c = (empty($sucrose_serving) && !empty($sucrose_100)) ? $sucrose_100*$serving_size/100 : (!empty($sucrose_serving) ? $sucrose_serving : NULL);
                $lactos_100_c = (empty($lactos_100) && !empty($lactos_serving)) ? $lactos_serving*100/$serving_size : (!empty($lactos_100) ? $lactos_100 : NULL);
                $lactos_serving_c = (empty($lactos_serving) && !empty($lactos_100)) ? $lactos_100*$serving_size/100 : (!empty($lactos_serving) ? $lactos_serving : NULL);
                $poliols_100_c = (empty($poliols_100) && !empty($poliols_serving)) ? $poliols_serving*100/$serving_size : (!empty($poliols_100) ? $poliols_100 : NULL);
                $poliols_serving_c = (empty($poliols_serving) && !empty($poliols_100)) ? $poliols_100*$serving_size/100 : (!empty($poliols_serving) ? $poliols_serving : NULL);
                $total_dietary_fiber_100_c = (empty($total_dietary_fiber_100) && !empty($total_dietary_fiber_serving)) ? $total_dietary_fiber_serving*100/$serving_size : (!empty($total_dietary_fiber_100) ? $total_dietary_fiber_100 : NULL);
                $total_dietary_fiber_serving_c = (empty($total_dietary_fiber_serving) && !empty($total_dietary_fiber_100)) ? $total_dietary_fiber_100*$serving_size/100 : (!empty($total_dietary_fiber_serving) ? $total_dietary_fiber_serving : NULL);
                $soluble_fiber_100_c = (empty($soluble_fiber_100) && !empty($soluble_fiber_serving)) ? $soluble_fiber_serving*100/$serving_size : (!empty($soluble_fiber_100) ? $soluble_fiber_100 : NULL);
                $soluble_fiber_serving_c = (empty($soluble_fiber_serving) && !empty($soluble_fiber_100)) ? $soluble_fiber_100*$serving_size/100 : (!empty($soluble_fiber_serving) ? $soluble_fiber_serving : NULL);
                $insoluble_fiber_100_c = (empty($insoluble_fiber_100) && !empty($insoluble_fiber_serving)) ? $insoluble_fiber_serving*100/$serving_size : (!empty($insoluble_fiber_100) ? $insoluble_fiber_100 : NULL);
                $insoluble_fiber_serving_c = (empty($insoluble_fiber_serving) && !empty($insoluble_fiber_100)) ? $insoluble_fiber_100*$serving_size/100 : (!empty($insoluble_fiber_serving) ? $insoluble_fiber_serving : NULL);
                $sodium_100_c = (empty($sodium_100) && !empty($sodium_serving)) ? $sodium_serving*100/$serving_size : (!empty($sodium_100) ? $sodium_100 : NULL);
                $sodium_serving_c = (empty($sodium_serving) && !empty($sodium_100)) ? $sodium_100*$serving_size/100 : (!empty($sodium_serving) ? $sodium_serving : NULL);

                #VITAMINAS Y MINERALES
                $vitamin_a_100_c = (empty($vitamin_a_100) && !empty($vitamin_a_serving)) ? $vitamin_a_serving*100/$serving_size : (!empty($vitamin_a_100) ? $vitamin_a_100 : NULL);
                $vitamin_a_serving_c = (empty($vitamin_a_serving) && !empty($vitamin_a_100)) ? $vitamin_a_100*$serving_size/100 : (!empty($vitamin_a_serving) ? $vitamin_a_serving : NULL);
                $vitamin_c_100_c = (empty($vitamin_c_100) && !empty($vitamin_c_serving)) ? $vitamin_c_serving*100/$serving_size : (!empty($vitamin_c_100) ? $vitamin_c_100 : NULL);
                $vitamin_c_serving_c = (empty($vitamin_c_serving) && !empty($vitamin_c_100)) ? $vitamin_c_100*$serving_size/100 : (!empty($vitamin_c_serving) ? $vitamin_c_serving : NULL);
                $vitamin_d_100_c = (empty($vitamin_d_100) && !empty($vitamin_d_serving)) ? $vitamin_d_serving*100/$serving_size : (!empty($vitamin_d_100) ? $vitamin_d_100 : NULL);
                $vitamin_d_serving_c = (empty($vitamin_d_serving) && !empty($vitamin_d_100)) ? $vitamin_d_100*$serving_size/100 : (!empty($vitamin_d_serving) ? $vitamin_d_serving : NULL);
                $vitamin_e_100_c = (empty($vitamin_e_100) && !empty($vitamin_e_serving)) ? $vitamin_e_serving*100/$serving_size : (!empty($vitamin_e_100) ? $vitamin_e_100 : NULL);
                $vitamin_e_serving_c = (empty($vitamin_e_serving) && !empty($vitamin_e_100)) ? $vitamin_e_100*$serving_size/100 : (!empty($vitamin_e_serving) ? $vitamin_e_serving : NULL);
                $vitamin_b1_100_c = (empty($vitamin_b1_100) && !empty($vitamin_b1_serving)) ? $vitamin_b1_serving*100/$serving_size : (!empty($vitamin_b1_100) ? $vitamin_b1_100 : NULL);
                $vitamin_b1_serving_c = (empty($vitamin_b1_serving) && !empty($vitamin_b1_100)) ? $vitamin_b1_100*$serving_size/100 : (!empty($vitamin_b1_serving) ? $vitamin_b1_serving : NULL);
                $vitamin_b2_100_c = (empty($vitamin_b2_100) && !empty($vitamin_b2_serving)) ? $vitamin_b2_serving*100/$serving_size : (!empty($vitamin_b2_100) ? $vitamin_b2_100 : NULL);
                $vitamin_b2_serving_c = (empty($vitamin_b2_serving) && !empty($vitamin_b2_100)) ? $vitamin_b2_100*$serving_size/100 : (!empty($vitamin_b2_serving) ? $vitamin_b2_serving : NULL);
                $niacin_100_c = (empty($niacin_100) && !empty($niacin_serving)) ? $niacin_serving*100/$serving_size : (!empty($niacin_100) ? $niacin_100 : NULL);
                $niacin_serving_c = (empty($niacin_serving) && !empty($niacin_100)) ? $niacin_100*$serving_size/100 : (!empty($niacin_serving) ? $niacin_serving : NULL);
                $vitamin_b6_100_c = (empty($vitamin_b6_100) && !empty($vitamin_b6_serving)) ? $vitamin_b6_serving*100/$serving_size : (!empty($vitamin_b6_100) ? $vitamin_b6_100 : NULL);
                $vitamin_b6_serving_c = (empty($vitamin_b6_serving) && !empty($vitamin_b6_100)) ? $vitamin_b6_100*$serving_size/100 : (!empty($vitamin_b6_serving) ? $vitamin_b6_serving : NULL);
                $folic_acid_100_c = (empty($folic_acid_100) && !empty($folic_acid_serving)) ? $folic_acid_serving*100/$serving_size : (!empty($folic_acid_100) ? $folic_acid_100 : NULL);
                $folic_acid_serving_c = (empty($folic_acid_serving) && !empty($folic_acid_100)) ? $folic_acid_100*$serving_size/100 : (!empty($folic_acid_serving) ? $folic_acid_serving : NULL);
                $vitamin_b12_100_c = (empty($vitamin_b12_100) && !empty($vitamin_b12_serving)) ? $vitamin_b12_serving*100/$serving_size : (!empty($vitamin_b12_100) ? $vitamin_b12_100 : NULL);
                $vitamin_b12_serving_c = (empty($vitamin_b12_serving) && !empty($vitamin_b12_100)) ? $vitamin_b12_100*$serving_size/100 : (!empty($vitamin_b12_serving) ? $vitamin_b12_serving : NULL);
                $pantothenic_acid_100_c = (empty($pantothenic_acid_100) && !empty($pantothenic_acid_serving)) ? $pantothenic_acid_serving*100/$serving_size : (!empty($pantothenic_acid_100) ? $pantothenic_acid_100 : NULL);
                $pantothenic_acid_serving_c = (empty($pantothenic_acid_serving) && !empty($pantothenic_acid_100)) ? $pantothenic_acid_100*$serving_size/100 : (!empty($pantothenic_acid_serving) ? $pantothenic_acid_serving : NULL);
                $biotin_100_c = (empty($biotin_100) && !empty($biotin_serving)) ? $biotin_serving*100/$serving_size : (!empty($biotin_100) ? $biotin_100 : NULL);
                $biotin_serving_c = (empty($biotin_serving) && !empty($biotin_100)) ? $biotin_100*$serving_size/100 : (!empty($biotin_serving) ? $biotin_serving : NULL);
                $choline_100_c = (empty($choline_100) && !empty($choline_serving)) ? $choline_serving*100/$serving_size : (!empty($choline_100) ? $choline_100 : NULL);
                $choline_serving_c = (empty($choline_serving) && !empty($choline_100)) ? $choline_100*$serving_size/100 : (!empty($choline_serving) ? $choline_serving : NULL);
                $vitamin_k_100_c = (empty($vitamin_k_100) && !empty($vitamin_k_serving)) ? $vitamin_k_serving*100/$serving_size : (!empty($vitamin_k_100) ? $vitamin_k_100 : NULL);
                $vitamin_k_serving_c = (empty($vitamin_k_serving) && !empty($vitamin_k_100)) ? $vitamin_k_100*$serving_size/100 : (!empty($vitamin_k_serving) ? $vitamin_k_serving : NULL);
                $betacarotene_100_c = (empty($betacarotene_100) && !empty($betacarotene_serving)) ? $betacarotene_serving*100/$serving_size : (!empty($betacarotene_100) ? $betacarotene_100 : NULL);
                $betacarotene_serving_c = (empty($betacarotene_serving) && !empty($betacarotene_100)) ? $betacarotene_100*$serving_size/100 : (!empty($betacarotene_serving) ? $betacarotene_serving : NULL);
                $calcium_100_c = (empty($calcium_100) && !empty($calcium_serving)) ? $calcium_serving*100/$serving_size : (!empty($calcium_100) ? $calcium_100 : NULL);
                $calcium_serving_c = (empty($calcium_serving) && !empty($calcium_100)) ? $calcium_100*$serving_size/100 : (!empty($calcium_serving) ? $calcium_serving : NULL);
                $chromium_100_c = (empty($chromium_100) && !empty($chromium_serving)) ? $chromium_serving*100/$serving_size : (!empty($chromium_100) ? $chromium_100 : NULL);
                $chromium_serving_c = (empty($chromium_serving) && !empty($chromium_100)) ? $chromium_100*$serving_size/100 : (!empty($chromium_serving) ? $chromium_serving : NULL);
                $copper_100_c = (empty($copper_100) && !empty($copper_serving)) ? $copper_serving*100/$serving_size : (!empty($copper_100) ? $copper_100 : NULL);
                $copper_serving_c = (empty($copper_serving) && !empty($copper_100)) ? $copper_100*$serving_size/100 : (!empty($copper_serving) ? $copper_serving : NULL);
                $yodo_100_c = (empty($yodo_100) && !empty($yodo_serving)) ? $yodo_serving*100/$serving_size : (!empty($yodo_100) ? $yodo_100 : NULL);
                $yodo_serving_c = (empty($yodo_serving) && !empty($yodo_100)) ? $yodo_100*$serving_size/100 : (!empty($yodo_serving) ? $yodo_serving : NULL);
                $iron_100_c = (empty($iron_100) && !empty($iron_serving)) ? $iron_serving*100/$serving_size : (!empty($iron_100) ? $iron_100 : NULL);
                $iron_serving_c = (empty($iron_serving) && !empty($iron_100)) ? $iron_100*$serving_size/100 : (!empty($iron_serving) ? $iron_serving : NULL);
                $magnesium_100_c = (empty($magnesium_100) && !empty($magnesium_serving)) ? $magnesium_serving*100/$serving_size : (!empty($magnesium_100) ? $magnesium_100 : NULL);
                $magnesium_serving_c = (empty($magnesium_serving) && !empty($magnesium_100)) ? $magnesium_100*$serving_size/100 : (!empty($magnesium_serving) ? $magnesium_serving : NULL);
                $manganese_100_c = (empty($manganese_100) && !empty($manganese_serving)) ? $manganese_serving*100/$serving_size : (!empty($manganese_100) ? $manganese_100 : NULL);
                $manganese_serving_c = (empty($manganese_serving) && !empty($manganese_100)) ? $manganese_100*$serving_size/100 : (!empty($manganese_serving) ? $manganese_serving : NULL);
                $molybdenum_100_c = (empty($molybdenum_100) && !empty($molybdenum_serving)) ? $molybdenum_serving*100/$serving_size : (!empty($molybdenum_100) ? $molybdenum_100 : NULL);
                $molybdenum_serving_c = (empty($molybdenum_serving) && !empty($molybdenum_100)) ? $molybdenum_100*$serving_size/100 : (!empty($molybdenum_serving) ? $molybdenum_serving : NULL);
                $phosphorus_100_c = (empty($phosphorus_100) && !empty($phosphorus_serving)) ? $phosphorus_serving*100/$serving_size : (!empty($phosphorus_100) ? $phosphorus_100 : NULL);
                $phosphorus_serving_c = (empty($phosphorus_serving) && !empty($phosphorus_100)) ? $phosphorus_100*$serving_size/100 : (!empty($phosphorus_serving) ? $phosphorus_serving : NULL);
                $zinc_100_c = (empty($zinc_100) && !empty($zinc_serving)) ? $zinc_serving*100/$serving_size : (!empty($zinc_100) ? $zinc_100 : NULL);
                $zinc_serving_c = (empty($zinc_serving) && !empty($zinc_100)) ? $zinc_100*$serving_size/100 : (!empty($zinc_serving) ? $zinc_serving : NULL);
                $selenium_100_c = (empty($selenium_100) && !empty($selenium_serving)) ? $selenium_serving*100/$serving_size : (!empty($selenium_100) ? $selenium_100 : NULL);
                $selenium_serving_c = (empty($selenium_serving) && !empty($selenium_100)) ? $selenium_100*$serving_size/100 : (!empty($selenium_serving) ? $selenium_serving : NULL);
            }
        ////////////////////////////////////////////
        
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
                'contain_potential_allergens' => (!empty($rows->get(60)[2])) ? 'SI' : ((!empty($rows->get(60)[3])) ? 'NO' : null),#$rows->get(56)[2],#$rows->get(56)[3]
                #'list_contain_potential_allergens' => $rows->get(13)[2],
                'cereals_gluten' => (!empty($rows->get(63)[2])) ? 'SI' : ((!empty($rows->get(63)[3])) ? 'NO' : null),
                'cereals_gluten_list' => $rows->get(63)[4],
                'crustacean_products' => (!empty($rows->get(64)[2])) ? 'SI' : ((!empty($rows->get(64)[3])) ? 'NO' : null),
                'crustacean_products_list' => $rows->get(64)[4],
                'egg_derivatives' => (!empty($rows->get(65)[2])) ? 'SI' : ((!empty($rows->get(65)[3])) ? 'NO' : null),
                'egg_derivatives_list' => $rows->get(65)[4],
                'fish_derivatives' => (!empty($rows->get(66)[2])) ? 'SI' : ((!empty($rows->get(66)[3])) ? 'NO' : null),
                'fish_derivatives_list' => $rows->get(66)[4],
                'peanuts_soy_derivatives' => (!empty($rows->get(67)[2])) ? 'SI' : ((!empty($rows->get(67)[3])) ? 'NO' : null),
                'peanuts_soy_derivatives_list' => $rows->get(67)[4],
                'milk_dairy_derivatives' => (!empty($rows->get(68)[2])) ? 'SI' : ((!empty($rows->get(68)[3])) ? 'NO' : null),
                'milk_dairy_derivatives_list' => $rows->get(68)[4],
                'nuts_derivatives' => (!empty($rows->get(69)[2])) ? 'SI' : ((!empty($rows->get(69)[3])) ? 'NO' : null),
                'nuts_derivatives_list' => $rows->get(69)[4],
                'sulfites_derivatives' => (!empty($rows->get(70)[2])) ? 'SI' : ((!empty($rows->get(70)[3])) ? 'NO' : null),
                'sulfites_derivatives_list' => $rows->get(70)[4],
            #TERCERA PARTE
                'glute_free_spike_main_face' => (!empty($rows->get(83)[2])) ? 'SI' : ((!empty($rows->get(83)[3])) ? 'NO' : null),
                'glute_free_spike_another_face' => (!empty($rows->get(84)[2])) ? 'SI' : ((!empty($rows->get(84)[3])) ? 'NO' : null),
                'glute_free_no_spike' => (!empty($rows->get(85)[2])) ? 'SI' : ((!empty($rows->get(85)[3])) ? 'NO' : null),
                #'health_certificate' => (!empty($rows->get(72)[2])) ? $rows->get(72)[2] : ((!empty($rows->get(72)[3])) ? $rows->get(72)[3] : null),
                #'organic_certification' => (!empty($rows->get(76)[2])) ? $rows->get(76)[2] : ((!empty($rows->get(76)[3])) ? $rows->get(76)[3] : null),
                #'certification_free_afp' => (!empty($rows->get(81)[2])) ? $rows->get(81)[2] : ((!empty($rows->get(81)[3])) ? $rows->get(81)[3] : null),
            #CUARTA PARTE
                'total_plate_count' => $rows->get(114)[2],
                'coliform' => $rows->get(115)[2],
                'e_coli' => $rows->get(116)[2],
                'e_coli_100' => $rows->get(117)[2],
                'e_coli_0157_h7' => $rows->get(118)[2],
                'campylobacter' => $rows->get(119)[2],
                'bacillus_cereus' => $rows->get(120)[2],
                'staphylococcus' => $rows->get(121)[2],
                'clostridium_perfringens' => $rows->get(122)[2],
                'listeria_monocytogenes' => $rows->get(123)[2],
                'enterobacteria' => $rows->get(124)[2],
                'mold' => $rows->get(125)[2],
                'yeast' => $rows->get(126)[2],
                'mold_count' => $rows->get(127)[2],
                'yeast_count' => $rows->get(128)[2],
                'salmonella_25' => $rows->get(129)[2],
                'salmonella_50' => $rows->get(130)[2],
                'lactobacillus' => $rows->get(131)[2],
                'aerobic_anaerobic_mesophilic_microorganisms' => $rows->get(132)[2],
                'aerobic_anaerobic_thermophilic_microorganisms' => $rows->get(133)[2],
                'thermophilic_commercial_sterility' => $rows->get(134)[2],
                'anaerobic_spores_reducing_sulfites' => $rows->get(135)[2],
                'cronobacter_10g' => $rows->get(136)[2],
            #QUINTA PARTE
                'ph' => $rows->get(140)[2],
                'porcent_aw' => $rows->get(141)[2],
            #SEXTA PARTE
                'type_primary_packaging' => $rows->get(145)[2],
                'type_secundary_packaging' => $rows->get(146)[2],
                'type_controls_sealing_air_tightness_primary_packaging' => $rows->get(147)[2],
            #NOVENA PARTE
                'product_type' => $product_type,
                'home_measure' => $home_measure[1],
                'serving_size' => $serving_size,
                'servings_per_container' => $servings_per_container[1],
                'energy_100' => (!empty($energy_100_c)) ? $energy_100_c : NULL,
                'proteins_100' => (!empty($proteins_100_c)) ? $proteins_100_c : NULL,
                'total_fat_100' => (!empty($total_fat_100_c)) ? $total_fat_100_c : NULL,
                'satured_fat_100' => (!empty($satured_fat_100_c)) ? $satured_fat_100_c : NULL,
                'trans_fat_100' => (!empty($trans_fat_100_c)) ? $trans_fat_100_c : NULL,
                'monosatured_fat_100' => (!empty($monosatured_fat_100_c)) ? $monosatured_fat_100_c : NULL,
                'polyunsatured_fat_100' => (!empty($polyunsatured_fat_100_c)) ? $polyunsatured_fat_100_c : NULL,
                'cholesterol_100' => (!empty($cholesterol_100_c)) ? $cholesterol_100_c : NULL,
                'total_carbohydrate_100' => (!empty($total_carbohydrate_100_c)) ? $total_carbohydrate_100_c : NULL,
                'available_carbohydrates_100' => (!empty($available_carbohydrates_100_c)) ? $available_carbohydrates_100_c : NULL,
                'total_sugars_100' => (!empty($total_sugars_100_c)) ? $total_sugars_100_c : NULL,
                'sucrose_100' => (!empty($sucrose_100_c)) ? $sucrose_100_c : NULL,
                'lactos_100' => (!empty($lactos_100_c)) ? $lactos_100_c : NULL,
                'poliols_100' => (!empty($poliols_100_c)) ? $poliols_100_c : NULL,
                'total_dietary_fiber_100' => (!empty($total_dietary_fiber_100_c)) ? $total_dietary_fiber_100_c : NULL,
                'soluble_fiber_100' => (!empty($soluble_fiber_100_c)) ? $soluble_fiber_100_c : NULL,
                'insoluble_fiber_100' => (!empty($insoluble_fiber_100_c)) ? $insoluble_fiber_100_c : NULL,
                'sodium_100' => (!empty($sodium_100_c)) ? $sodium_100_c : NULL,
                'energy_serving' => (!empty($energy_serving_c)) ? $energy_serving_c : NULL,
                'proteins_serving' => (!empty($proteins_serving_c)) ? $proteins_serving_c : NULL,
                'total_fat_serving' => (!empty($total_fat_serving_c)) ? $total_fat_serving_c : NULL,
                'satured_fat_serving' => (!empty($satured_fat_serving_c)) ? $satured_fat_serving_c : NULL,
                'trans_fat_serving' => (!empty($trans_fat_serving_c)) ? $trans_fat_serving_c : NULL,
                'monosatured_fat_serving' => (!empty($monosatured_fat_serving_c)) ? $monosatured_fat_serving_c : NULL,
                'polyunsatured_fat_serving' => (!empty($polyunsatured_fat_serving_c)) ? $polyunsatured_fat_serving_c : NULL,
                'cholesterol_serving' => (!empty($cholesterol_serving_c)) ? $cholesterol_serving_c : NULL,
                'total_carbohydrate_serving' => (!empty($total_carbohydrate_serving_c)) ? $total_carbohydrate_serving_c : NULL,
                'available_carbohydrates_serving' => (!empty($available_carbohydrates_serving_c)) ? $available_carbohydrates_serving_c : NULL,
                'total_sugars_serving' => (!empty($total_sugars_serving_c)) ? $total_sugars_serving_c : NULL,
                'sucrose_serving' => (!empty($sucrose_serving_c)) ? $sucrose_serving_c : NULL,
                'lactos_serving' => (!empty($lactos_serving_c)) ? $lactos_serving_c : NULL,
                'poliols_serving' => (!empty($poliols_serving_c)) ? $poliols_serving_c : NULL,
                'total_dietary_fiber_serving' => (!empty($total_dietary_fiber_serving_c)) ? $total_dietary_fiber_serving_c : NULL,
                'soluble_fiber_serving' => (!empty($soluble_fiber_serving_c)) ? $soluble_fiber_serving_c : NULL,
                'insoluble_fiber_serving' => (!empty($insoluble_fiber_serving_c)) ? $insoluble_fiber_serving_c : NULL,
                'sodium_serving' => (!empty($sodium_serving_c)) ? $sodium_serving_c : NULL,
            #NOVENA PARTE 2
                'serving_size_reconstitued' => $serving_size_reconstitued,#NUVA COLUMNA
                'servings_per_container_reconstitued' => $servings_per_container_reconstitued[1],#NUVA COLUMNA
                'energy_100_reconstitued' => $rows->get(190)[2],#NUEVA COLUMNA
                'proteins_100_reconstitued' => $rows->get(191)[2],#NUEVA COLUMNA
                'total_fat_100_reconstitued' => $rows->get(192)[2],#NUEVA COLUMNA
                'satured_fat_100_reconstitued' => $rows->get(193)[2],#NUEVA COLUMNA
                'trans_fat_100_reconstitued' => $rows->get(194)[2],#NUEVA COLUMNA
                'monosatured_fat_100_reconstitued' => $rows->get(195)[2],#NUEVA COLUMNA
                'polyunsatured_fat_100_reconstitued' => $rows->get(196)[2],#NUEVA COLUMNA
                'cholesterol_100_reconstitued' => $rows->get(197)[2],#NUEVA COLUMNA
                'total_carbohydrate_100_reconstitued' => $rows->get(198)[2],#NUEVA COLUMNA
                'available_carbohydrates_100_reconstitued' => $rows->get(199)[2],#NUEVA COLUMNA
                'total_sugars_100_reconstitued' => $rows->get(200)[2],#NUEVA COLUMNA
                'sucrose_100_reconstitued' => $rows->get(201)[2],#NUEVA COLUMNA
                'lactos_100_reconstitued' => $rows->get(202)[2],#NUEVA COLUMNA
                'poliols_100_reconstitued' => $rows->get(203)[2],#NUEVA COLUMNA
                'total_dietary_fiber_100_reconstitued' => $rows->get(204)[2],#NUEVA COLUMNA
                'soluble_fiber_100_reconstitued' => $rows->get(205)[2],#NUEVA COLUMNA
                'insoluble_fiber_100_reconstitued' => $rows->get(206)[2],#NUEVA COLUMNA
                'sodium_100_reconstitued' => $rows->get(207)[2],#NUEVA COLUMNA
                'energy_serving_reconstitued' => $rows->get(190)[3],#NUEVA COLUMNA
                'proteins_serving_reconstitued' => $rows->get(191)[3],#NUEVA COLUMNA
                'total_fat_serving_reconstitued' => $rows->get(192)[3],#NUEVA COLUMNA
                'satured_fat_serving_reconstitued' => $rows->get(193)[3],#NUEVA COLUMNA
                'trans_fat_serving_reconstitued' => $rows->get(194)[3],#NUEVA COLUMNA
                'monosatured_fat_serving_reconstitued' => $rows->get(195)[3],#NUEVA COLUMNA
                'polyunsatured_fat_serving_reconstitued' => $rows->get(196)[3],#NUEVA COLUMNA
                'cholesterol_serving_reconstitued' => $rows->get(197)[3],#NUEVA COLUMNA
                'total_carbohydrate_serving_reconstitued' => $rows->get(198)[3],#NUEVA COLUMNA
                'available_carbohydrates_serving_reconstitued' => $rows->get(199)[3],#NUEVA COLUMNA
                'total_sugars_serving_reconstitued' => $rows->get(200)[3],#NUEVA COLUMNA
                'sucrose_serving_reconstitued' => $rows->get(201)[3],#NUEVA COLUMNA
                'lactos_serving_reconstitued' => $rows->get(202)[3],#NUEVA COLUMNA
                'poliols_serving_reconstitued' => $rows->get(203)[3],#NUEVA COLUMNA
                'total_dietary_fiber_serving_reconstitued' => $rows->get(204)[3],#NUEVA COLUMNA
                'soluble_fiber_serving_reconstitued' => $rows->get(205)[3],#NUEVA COLUMNA
                'insoluble_fiber_serving_reconstitued' => $rows->get(206)[3],#NUEVA COLUMNA
                'sodium_serving_reconstitued' => $rows->get(207)[3],#NUEVA COLUMNA
                'energy_serving_reconstitued_r' => $rows->get(190)[4],#NUEVA COLUMNA
                'proteins_serving_reconstitued_r' => $rows->get(191)[4],#NUEVA COLUMNA
                'total_fat_serving_reconstitued_r' => $rows->get(192)[4],#NUEVA COLUMNA
                'satured_fat_serving_reconstitued_r' => $rows->get(193)[4],#NUEVA COLUMNA
                'trans_fat_serving_reconstitued_r' => $rows->get(194)[4],#NUEVA COLUMNA
                'monosatured_fat_serving_reconstitued_r' => $rows->get(195)[4],#NUEVA COLUMNA
                'polyunsatured_fat_serving_reconstitued_r' => $rows->get(196)[4],#NUEVA COLUMNA
                'cholesterol_serving_reconstitued_r' => $rows->get(197)[4],#NUEVA COLUMNA
                'total_carbohydrate_serving_reconstitued_r' => $rows->get(198)[4],#NUEVA COLUMNA
                'available_carbohydrates_serving_reconstitued_r' => $rows->get(199)[4],#NUEVA COLUMNA
                'total_sugars_serving_reconstitued_r' => $rows->get(200)[4],#NUEVA COLUMNA
                'sucrose_serving_reconstitued_r' => $rows->get(201)[4],#NUEVA COLUMNA
                'lactos_serving_reconstitued_r' => $rows->get(202)[4],#NUEVA COLUMNA
                'poliols_serving_reconstitued_r' => $rows->get(203)[4],#NUEVA COLUMNA
                'total_dietary_fiber_serving_reconstitued_r' => $rows->get(204)[4],#NUEVA COLUMNA
                'soluble_fiber_serving_reconstitued_r' => $rows->get(205)[4],#NUEVA COLUMNA
                'insoluble_fiber_serving_reconstitued_r' => $rows->get(206)[4],#NUEVA COLUMNA
                'sodium_serving_reconstitued_r' => $rows->get(207)[4],#NUEVA COLUMNA
            #DECIMA PARTE
                'vitamin_a_100' => $vitamin_a_100_c,
                'vitamin_c_100' => $vitamin_c_100_c,
                'vitamin_d_100' => $vitamin_d_100_c,
                'vitamin_e_100' => $vitamin_e_100_c,
                'vitamin_b1_100' => $vitamin_b1_100_c,
                'vitamin_b2_100' => $vitamin_b2_100_c,
                'niacin_100' => $niacin_100_c,
                'vitamin_b6_100' => $vitamin_b6_100_c,
                'folic_acid_100' => $folic_acid_100_c,
                'vitamin_b12_100' => $vitamin_b12_100_c,
                'pantothenic_acid_100' => $pantothenic_acid_100_c,
                'biotin_100' => $biotin_100_c,
                'choline_100' => $choline_100_c,
                'vitamin_k_100' => $vitamin_k_100_c,
                'betacarotene_100' => $betacarotene_100_c,
                'calcium_100' => $calcium_100_c,
                'chromium_100' => $chromium_100_c,
                'copper_100' => $copper_100_c,
                'yodo_100' => $yodo_100_c,
                'iron_100' => $iron_100_c,
                'magnesium_100' => $magnesium_100_c,
                'manganese_100' => $manganese_100_c,
                'molybdenum_100' => $molybdenum_100_c,
                'phosphorus_100' => $phosphorus_100_c,
                'zinc_100' => $zinc_100_c,
                'selenium_100' => $selenium_100_c,
                'vitamin_a_serving' => $vitamin_a_serving_c,
                'vitamin_c_serving' => $vitamin_c_serving_c,
                'vitamin_d_serving' => $vitamin_d_serving_c,
                'vitamin_e_serving' => $vitamin_e_serving_c,
                'vitamin_b1_serving' => $vitamin_b1_serving_c,
                'vitamin_b2_serving' => $vitamin_b2_serving_c,
                'niacin_serving' => $niacin_serving_c,
                'vitamin_b6_serving' => $vitamin_b6_serving_c,
                'folic_acid_serving' => $folic_acid_serving_c,
                'vitamin_b12_serving' => $vitamin_b12_serving_c,
                'pantothenic_acid_serving' => $pantothenic_acid_serving_c,
                'biotin_serving' => $biotin_serving_c,
                'choline_serving' => $choline_serving_c,
                'vitamin_k_serving' => $vitamin_k_serving_c,
                'betacarotene_serving' => $betacarotene_serving_c,
                'calcium_serving' => $calcium_serving_c,
                'chromium_serving' => $chromium_serving_c,
                'copper_serving' => $copper_serving_c,
                'yodo_serving' => $yodo_serving_c,
                'iron_serving' => $iron_serving_c,
                'magnesium_serving' => $magnesium_serving_c,
                'manganese_serving' => $manganese_serving_c,
                'molybdenum_serving' => $molybdenum_serving_c,
                'phosphorus_serving' => $phosphorus_serving_c,
                'zinc_serving' => $zinc_serving_c,
                'selenium_serving' => $selenium_serving_c,

                #ONCEAVA PARTE
                    'total_aflatoxins' => $rows->get(249)[2],
                    'aflatoxina_m1' => $rows->get(250)[2],
                    'zearalenone' => $rows->get(251)[2],
                    'patulin' => $rows->get(252)[2],
                    'ochratoxin' => $rows->get(253)[2],
                    'deoxynivalenol' => $rows->get(254)[2],
                    'fumonisinas' => $rows->get(255)[2],
                    'zn' => $rows->get(258)[2],
                    'pb' => $rows->get(259)[2],
                    'cd' => $rows->get(260)[2],
                    'hg' => $rows->get(261)[2],
                    'sn' => $rows->get(262)[2],
                    'cu' => $rows->get(263)[2],
                    'ars' => $rows->get(264)[2],
                    'se' => $rows->get(265)[2],
                    'chloramphenicol' => $rows->get(268)[2],
                    'sulfonamides' => $rows->get(269)[2],
                    'tetracycline' => $rows->get(270)[2],
                    'quinolones' => $rows->get(271)[2],
                    'macrolides' => $rows->get(272)[2],
                    'betalactams' => $rows->get(273)[2],
                    'amphenicols' => $rows->get(274)[2],
                    'steroids' => $rows->get(275)[2],
                    'zeranol' => $rows->get(276)[2],
                    'pesticides' => $rows->get(277)[2],
                    'dioxin_furan' => $rows->get(278)[2],
                
            ]);
    }
}
