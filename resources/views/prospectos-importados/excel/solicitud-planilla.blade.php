<!DOCTYPE html>
    <html>
        <body>
            <table>
                <tr>
                    <th colspan="4" style="font:bold;width:150px">PLANILLA SOLICITUD PARA PROVEEDORES IMPORTADOS</th>
                </tr>
            </table>
            <br>
            <br>
            <table>
                <tr>
                    <th style="font:bold;width:150px">NAME OF SUPPLIER</th>
                    <th style="font:bold;width:150px">{{ $data->nombre_proveedor }}</th>
                </tr>
                <tr>
                    <th style="font:bold;width:150px">Date</th>
                    <th style="font:bold;width:150px">{{ date('d-m-Y') }}</th>
                </tr>
            </table>
            <br>
            <br>
            <table>
                <thead>
                    <tr>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">UPC or EAN code</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Name of the product</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Comments</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Origin CLAIM</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Ley 20,606_ 2019</th>
                        <th align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Categoría alimento</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Grasas trans de origen aceites hidrogenados</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Energy (kcal) </th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Protein (g)</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Total Fat (g)</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Satured fat (g)</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Trans fat (g) </th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Monounsatured fat (g) </th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Polyunsatured fat (g) </th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Cholesterol (mg) </th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Carbohydrate (g) </th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Total sugars ( g)</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Sucrose (g)</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Lactose(g)</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Poliols (g)</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Total dietary fiber (g) </th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Soluble fiber (g)</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Insoluble fiber (g)</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Sodium (mg)</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Support Nutrition Facts</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Addition of Vitamins</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Addition of minerals</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Indicate net weight</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Indicate drained weight</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Indicate country origin</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Milking country</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">indicate type expiration date used</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Indicate Shelf Life</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Indicate storage conditions</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Indicate method of preparation</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Indicate name of supplier</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Indicate quantity of additive used by 100G</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Indicate type of vegetable oil or fat used</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Indicate name of herbs or spices used</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Indicate quantity of sweetener used per 100g </th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Indicate if flavourings or aroma used are natural or artificial</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Indicate quantity of xilitol, maltitol, sorbitol, glicerol per 100G</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Indicate of quantity caffeine used ( mg/100g)</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">If any extract is used, to indicate function, chemical process and name of component extracted</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Indicate origin of gelatin used ( Pork or Bovine)</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">To indicate  ° Brix of the final product (customs requirement)</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">º Brix of the final product without added sugar</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">º Brix of fruit that is in greater proportion in the drink</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Indicate name of colourings</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Indicate minimum % of cocoa solids used</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Indicate the % cocoa butter from recipe</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">% characterizing ingredient</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Attach organic certificate ( Master and transaction)</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Indicate % of organic ingredient in the formulation</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Attach health certificate</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Attach phytosanitary certificate</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">If honey is used, to send certificate Free of AFB ( American Foulbrood Bee)</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">If product is gluten free, attach analysis</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">If product has Aloe Vera, send hidroxianthracene analysis</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">If product has Aloe vera, send Aloine analysis</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Microbiologycal Analysis ( Attach laboratory analysis)</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Multiresidue Analysis </th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Label Design</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Flow chart</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">HACCP certificate</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Chemical values(pH)</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Chemical values(aw)</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Allergen information</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Type of primary packaging used</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Type of secundary packaging used</th>
                        <th colspan="2" align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Indicate type of controls used in sealing or air tightness of primary packaging </th>
                        <th style="background-color:#99CCFF;border: 1px solid #0000;width:150px">other requirements</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data->productos_solicitud_prospecto as $item)
                        <tr>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->upc_bar_code }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->upc_bar_code }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->product_name }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->product_name }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->comments }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->comments }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ (!empty($item->obs->claims_origin)) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->claims_origin }}</td>
                            <td style="border: 1px solid #0000;width:150px;">?</td>
                            <td style="border: 1px solid #0000;width:150px;">?</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->product_type }}</td>
                            <td style="border: 1px solid #0000;width:150px;">?</td>
                            <td style="border: 1px solid #0000;width:150px;">?</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->energy) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->energy }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->proteins) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->proteins }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->total_fat) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->total_fat }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->satured_fat) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->satured_fat }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->trans_fat) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->trans_fat }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->monosatured_fat) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->monosatured_fat }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->polyunsatured_fat) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->polyunsatured_fat }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->cholesterol) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->cholesterol }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->total_carbohydrate) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->total_carbohydrate }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->available_carbohydrates) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->available_carbohydrates }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->total_sugars) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->total_sugars }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->sucrose) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->sucrose }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->lactos) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->lactos }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->poliols) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->poliols }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->total_dietary_fiber) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->total_dietary_fiber }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->soluble_fiber) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->soluble_fiber }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->insoluble_fiber) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->insoluble_fiber }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->sodium) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->sodium }}</td>
                            <td style="border: 1px solid #0000;width:150px;">?</td>
                            <td style="border: 1px solid #0000;width:150px;">?</td>
                            <td style="border: 1px solid #0000;width:150px;">?</td>
                            <td style="border: 1px solid #0000;width:150px;">?</td>
                            <td style="border: 1px solid #0000;width:150px;">?</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->net_weight) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->net_weight }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->drained_weight) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->drained_weight }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->country) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->country }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->milking_country) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->milking_country }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->expiration_date) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->expiration_date }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->shelf_life) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->shelf_life }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->storage_conditions) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->storage_conditions }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->method_preparation) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->method_preparation }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->name_supplier) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->name_supplier }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->quantity_additive) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->quantity_additive }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->vegetable_oil_fat_used) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->vegetable_oil_fat_used }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->spices_herbs_used) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->spices_herbs_used }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->quantity_sweetener_per_100_gr_ml) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->quantity_sweetener_per_100_gr_ml }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->flavourings_aroma_natural_artificial) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->flavourings_aroma_natural_artificial }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->quantity_x_m_s_g) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->quantity_x_m_s_g }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->quantity_x_m_s_g) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->quantity_caffeine }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->any_extract_used) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->any_extract_used }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->origin_gelatin) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->origin_gelatin }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->brix_final_product) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->brix_final_product }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->brix_final_product_without_added_sugar) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->brix_final_product_without_added_sugar }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->brix_fruit_greater_proportion_drink) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->brix_fruit_greater_proportion_drink }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->brix_fruit_greater_proportion_drink) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->brix_fruit_greater_proportion_drink }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->minimum_porcent_cocoa_solids) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->minimum_porcent_cocoa_solids }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->porcent_cocoa_butter_cocoa_mass) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->porcent_cocoa_butter_cocoa_mass }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->porcent_characterizing_ingredients) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->porcent_characterizing_ingredients }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->organic_certification) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->organic_certification }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->porcent_organic_ingredients) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->porcent_organic_ingredients }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->health_certificate) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->health_certificate }}</td>
                            <td style="border: 1px solid #0000;width:150px;">?</td>
                            <td style="border: 1px solid #0000;width:150px;">?</td>
                            <td style="border: 1px solid #0000;width:150px;">?</td>
                            <td style="border: 1px solid #0000;width:150px;">?</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->gluten_free) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->gluten_free }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->hidroxianthracene) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->hidroxianthracene }}</td>
                            <td style="border: 1px solid #0000;width:150px;">?</td>
                            <td style="border: 1px solid #0000;width:150px;">?</td>
                            <td style="border: 1px solid #0000;width:150px;">?</td>
                            <td style="border: 1px solid #0000;width:150px;">?</td>
                            <td style="border: 1px solid #0000;width:150px;">?</td>
                            <td style="border: 1px solid #0000;width:150px;">?</td>
                            <td style="border: 1px solid #0000;width:150px;">?</td>
                            <td style="border: 1px solid #0000;width:150px;">?</td>
                            <td style="border: 1px solid #0000;width:150px;">?</td>
                            <td style="border: 1px solid #0000;width:150px;">?</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->haccp) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->haccp }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->ph) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->ph }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->aw) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->aw }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->contain_potential_allergens) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->contain_potential_allergens }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->type_primary_packaging) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->type_primary_packaging }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->type_secundary_packaging) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->type_secundary_packaging }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ !empty($item->obs->type_controls_sealing_air_tightness_primary_packaging) ? 'X' : null }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->obs->type_controls_sealing_air_tightness_primary_packaging }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->observacion_solicitud }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </body>
    </html>