<!DOCTYPE html>
    <html>
        <style>
            .td-class{
                border: 1px solid #0000;
            }
        </style>
        <body>
            <table>
                <tr>
                    <th rowspan="300" style="width:20px"></th>
                </tr>
                <tr>
                    <th rowspan="3" style="border: 1px solid #0000;width:250px"><img src="{{public_path('/img/logo-cencosud-excel.jpg') }}" alt="Tu Imagen"></th>
                    <th rowspan="3" colspan="5" align="center" style="border: 1px solid #0000;width:150px;vertical-align: middle;font-weight:bold">DOCUMENTO</th>
                    <th colspan="2" style="border: 1px solid #0000;">Código: J500-D-ACA-IMP-005</th>
                </tr>
                <tr>
                    <th colspan="2" style="border: 1px solid #0000;width:200px">Revisión: 008</th>
                </tr>
                <tr>
                    <th colspan="2" style="border: 1px solid #0000;">Fecha: {{ date('d/m/Y') }}</th>
                </tr>
                <tr>
                    <th colspan="8" align="center" style="border: 1px solid #0000;font-weight:bold">TECHNICAL FORM FOR FOREIGN SUPPLIERS</th>
                </tr>
            </table>
            <table>
                <tr><th colspan="3" style="border: 1px solid #0000;font-weight:bold">( *): To complete mandatory</th></tr>
                <tr><th colspan="3" style="border: 1px solid #0000;font-weight:bold">( **): To complete only when it is necessary for ingredients</th></tr>
            </table>
            <table>
                <tr><th style="font-weight:bold">1.- PRODUCT INFORMATION</th></tr>
            </table>
            <table>
                <tr>
                    <td style="border: 1px solid #0000;">SAP</td>
                    <td colspan="7" style="border: 1px solid #0000;">{{ $data->sap }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Product Name(*)</td>
                    <td colspan="7" style="border: 1px solid #0000;">{{ $data->product_name }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Nombre producto español</td>
                    <td colspan="7" style="border: 1px solid #0000;">{{ $data->product_name }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Claims origin</td>
                    <td colspan="7" style="border: 1px solid #0000;">{{ $data->claims_origin }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Comments</td>
                    <td colspan="7" style="border: 1px solid #0000;">{{ $data->comments }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Name and organic certifying number</td>
                    <td colspan="7" style="border: 1px solid #0000;">{{ $data->name_organic_certifying_number }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Plant number o Factory (SAG)(**)</td>
                    <td colspan="7" style="border: 1px solid #0000;">{{ $data->plant_number_factory }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Net weight(*)</td>
                    <td colspan="7" style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Drained weight(**)</td>
                    <td colspan="7" style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Units per packaging(*)</td>
                    <td colspan="7" style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Country of origin(*)</td>
                    <td colspan="7" style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Milking country</td>
                    <td colspan="7" style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">To indicate the type expiration date used ( Expiration date and lot number or elaboration and expiration date or date of elaboration and shelf life)(*)</td>
                    <td colspan="7" style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Name and adress manufacturer(*)</td>
                    <td colspan="7" style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Shelf life(*)</td>
                    <td colspan="7" style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">UPC or Bar Code(*)</td>
                    <td colspan="7" style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Storage conditions(*) </td>
                    <td colspan="7" style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Method of preparation(**)</td>
                    <td colspan="7" style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Name of supplier(*)</td>
                    <td colspan="7" style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Ingredients(*)</td>
                    <td colspan="7" style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">For organic products, indicate % of organic ingredients</td>
                    <td colspan="7" style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Indicate % characterizing ingredients</td>
                    <td colspan="7" style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">To indicate quantity of additive(**)</td>
                    <td colspan="7" style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">To indicate type fo vegetable oil or fat used(**)</td>
                    <td colspan="7" style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">indicate if there are trans fats of hydrogenated origin</td>
                    <td colspan="7" style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">To Indicate names of spices and herbs used (**)</td>
                    <td colspan="7" style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">To indicate quantity of sweetener per 100 grams or ml of CYCLAMAT, ASPARTAME, SUCRALOSE, ACESULFAM K, SACHARINE, STEVIA, ALITAME ( mg) (**)</td>
                    <td colspan="7" style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">To indicate if flavourings or aroma used are natural or artificial (**)</td>
                    <td colspan="7" style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">To indicate quantity of xilitol, maltitol, sorbitol, glicerol (g/100g) (**)</td>
                    <td colspan="7" style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">To indicate quantity of caffeine (mg/100g) used (**)</td>
                    <td colspan="7" style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">If there's any extract used, to indicate function, chemical process and name of the component extracted (**)</td>
                    <td colspan="7" style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">To indicate origin of gelatin used   ( Pork or Bovine) (**)</td>
                    <td colspan="7" style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">To indicate  ° Brix of the final product (customs requirement)</td>
                    <td colspan="7" style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">To indicate  ° Brix of the final product without added sugar(**)</td>
                    <td colspan="7" style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">To indicate ° Brix of the fruit that is in greater proportion in the drink(**)</td>
                    <td colspan="7" style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">To indicate names of colourings used (**)</td>
                    <td colspan="7" style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">To indicate minimum % of cocoa solids used (**)</td>
                    <td colspan="7" style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">To indicate the % of cocoa butter  from recipe and as part of cocoa mass (**)</td>
                    <td colspan="7" style="border: 1px solid #0000;"></td>
                </tr>
            </table>
            <br><br><br><br>
            <table>
                <tr><th style="font-weight:bold">2.- ALLERGEN INFORMATION(*)</th></tr>
                <tr>
                    <th></th>
                    <th>YES</th>
                    <th>NO</th>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Does this item or its process line contain potential allergens?</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                    <td></td>
                    <td colspan="4" rowspan="11" style="border: 1px solid #0000;vertical-align: top">If yes, please list: </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>YES</td>
                    <td>NO</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Cereals with gluten</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Crustacean and products</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Egg and derivatives</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Fish and derivatives</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Peanuts, Soy  and derivatives</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">milk and dairy derivatives</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Nuts and derivatives</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Sulfites And derivatives (concentrations of more than 10mg)</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
            </table>
            <br>
            <table>
                <tr><th style="font-weight:bold">3.- CERTIFICATES</th></tr>
                <tr><td></td></tr>
                <tr>
                    <td style="border: 1px solid #0000;">healt certificate(*)</td>
                    <td>YES</td>
                    <td>NO</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Do you have health certificate to export to Chile?</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                    <td></td>
                    <td colspan="4" rowspan="2" style="border: 1px solid #0000;vertical-align: top">If not, should send microbiological analysis of current export batch</td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Organic certification(**)</td>
                    <td>YES</td>
                    <td>NO</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Do you have Organic certification (Master, description and transaction)?</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                    <td></td>
                    <td colspan="4" rowspan="2" style="border: 1px solid #0000;vertical-align: top">If yes, ATTACH CERTIFICATES OF PRODUCTS ORGANIC:</td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Certification Free of AFP (American Foulbrood Bee (loque Americana))(**)
                    </td>
                    <td>YES</td>
                    <td>NO</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Does the product contain Honey?</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                    <td></td>
                    <td colspan="4" rowspan="2" style="border: 1px solid #0000;vertical-align: top">If yes, ATTACH CERTIFICATE  FREE of AFP:</td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr><th style="font-weight:bold">4.-THERMOGRAPH(**)</th></tr>
                <tr>
                    <td colspan="7"></td>
                    <td>YES</td>
                </tr>
                <tr>
                    <td colspan="7" style="border: 1px solid #0000;">For shipments with frozen and refrigerated foods, the use of thermograph it's mandatory</td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
            </table>
            <br>
            <table>
                <tr><th style="font-weight:bold">5.- GENETICALLY MODIFIED INGREDIENT INFORMATION</th></tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>YES</td>
                    <td>NO</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Does this item contain GMO Ingredients ?</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                    <td></td>
                    <td colspan="4" rowspan="2" style="border: 1px solid #0000;vertical-align: top">If yes, please list:</td>
                </tr>
            </table>
            <br>
            <table>
                <tr><th style="font-weight:bold">6.- MICROBIOLOGICAL LIMITS(*)</th></tr>
                <tr><td></td></tr>
                <tr><td colspan="7">For all products attach laboratory analysis and complete microbiological limits (ufc):</td></tr>
                <tr><td></td></tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Total Plate Count:</td>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Staphylococcus:</td>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Mold:</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Coliform:</td>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Clostridium perfringens:</td>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Yeast: </td></tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">E. Coli:</td>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Listeria Monocytogenes: </td>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Salmonella:</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">E. Coli 0157:H7:</td>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Trichinella spiralis:</td>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Lactobacillus:</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Campylobacter:</td>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Enterobacteria: </td>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Thermophilic(commercial sterility):</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Bacillus cereus:</td>
                </tr>
            </table>
            <br>
            <table>
                <tr><th style="font-weight:bold">7.- CHEMICAL VALUES(*)</th></tr>
                <tr><td></td></tr>
                <tr>
                    <td style="border: 1px solid #0000;">pH</td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">aw ( water activity) %</td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr><th style="font-weight:bold">8.- PACKAGING(*)</th></tr>
                <tr><td></td></tr>
                <tr>
                    <td style="border: 1px solid #0000;">Type of primary packaging used</td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Type of secundary packaging used</td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Indicate type of controls used in sealing or air tightness of primary packaging </td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
            </table>
            <br>
            <table>
                <tr><th style="font-weight:bold">9.- NUTRITIONAL INFORMATION(*)</th></tr>
                <tr><td></td></tr>
                <tr>
                    <td colspan="3">Indicar si el producto es liquido o solido</td>
                    <td style="border: 1px solid #0000;">LIQUIDO</td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td style="border: 1px solid #0000;">SOLIDO</td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td style="border: 1px solid #0000;">NUTRITIONAL FACTS</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Serving Size: ( g or ml)</td>
                    <td style="border: 1px solid #0000;">100 g or ml</td>
                    <td style="border: 1px solid #0000;">1 serving</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Servings per Container:</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Energy ( kcal)</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Proteins (g)</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Total fat (g)</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Satured fat (g)</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Trans fat (g)</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Monosatured fat (g)</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Polyunsatured fat (g)</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Cholesterol (mg)</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Total Carbohydrate (g)</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Available carbohydrates(g)</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Total Sugars (g)</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Sucrose (g)</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Lactose(g)</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Poliols (g)</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Total Dietary fiber (g)</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Soluble fiber (g)</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Insoluble fiber (g)</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Sodium (mg)</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                </tr>
                <tr><td></td></tr>
                <tr>
                    <td colspan="8">Cuando sean azúcares propios de la fruta, incluir comentario despuès de tabla nutricional " Azúcares presentes en forma natural, no adicionados".</td>
                </tr>
            </table>
            <table>
                <tr><th style="font-weight:bold">10.- VITAMINS AND MINERALS ( **)</th></tr>
                <tr><td></td></tr>
                <tr>
                    <td style="border: 1px solid #0000;font-weight:bold">VITAMINS</td>
                    <td style="border: 1px solid #0000">100 g or ml</td>
                    <td style="border: 1px solid #0000">1 serving</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000">Vitamin A (ug)</td>
                    <td style="border: 1px solid #0000"></td>
                    <td style="border: 1px solid #0000"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000">Vitamin C ( mg)</td>
                    <td style="border: 1px solid #0000"></td>
                    <td style="border: 1px solid #0000"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000">Vitamin D (ug)</td>
                    <td style="border: 1px solid #0000"></td>
                    <td style="border: 1px solid #0000"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000">Vitamin E (mg)</td>
                    <td style="border: 1px solid #0000"></td>
                    <td style="border: 1px solid #0000"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000">Vitamin B1 ( mg)</td>
                    <td style="border: 1px solid #0000"></td>
                    <td style="border: 1px solid #0000"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000">Vitamin B2 (mg)</td>
                    <td style="border: 1px solid #0000"></td>
                    <td style="border: 1px solid #0000"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000">Niacin ( mg)</td>
                    <td style="border: 1px solid #0000"></td>
                    <td style="border: 1px solid #0000"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000">Vitamin B6 (mg)</td>
                    <td style="border: 1px solid #0000"></td>
                    <td style="border: 1px solid #0000"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000">Folic acid (ug)</td>
                    <td style="border: 1px solid #0000"></td>
                    <td style="border: 1px solid #0000"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000">Vitamin B12 (ug)</td>
                    <td style="border: 1px solid #0000"></td>
                    <td style="border: 1px solid #0000"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000">Pantothenic acid (mg)</td>
                    <td style="border: 1px solid #0000"></td>
                    <td style="border: 1px solid #0000"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000">Biotin (ug)</td>
                    <td style="border: 1px solid #0000"></td>
                    <td style="border: 1px solid #0000"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000">Choline (mg)</td>
                    <td style="border: 1px solid #0000"></td>
                    <td style="border: 1px solid #0000"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000">Vitamin K (ug)</td>
                    <td style="border: 1px solid #0000"></td>
                    <td style="border: 1px solid #0000"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000">Betacarotene (mg)</td>
                    <td style="border: 1px solid #0000"></td>
                    <td style="border: 1px solid #0000"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;font-weight:bold">MINERALS</td>
                    <td style="border: 1px solid #0000">100 g or ml</td>
                    <td style="border: 1px solid #0000">1 serving</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000">Calcium (mg)</td>
                    <td style="border: 1px solid #0000"></td>
                    <td style="border: 1px solid #0000"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000">Chromium (ug)</td>
                    <td style="border: 1px solid #0000"></td>
                    <td style="border: 1px solid #0000"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000">Copper (mg)</td>
                    <td style="border: 1px solid #0000"></td>
                    <td style="border: 1px solid #0000"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000">Yodo (ug)</td>
                    <td style="border: 1px solid #0000"></td>
                    <td style="border: 1px solid #0000"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000">Iron ( mg)</td>
                    <td style="border: 1px solid #0000"></td>
                    <td style="border: 1px solid #0000"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000">Magnesium (mg)</td>
                    <td style="border: 1px solid #0000"></td>
                    <td style="border: 1px solid #0000"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000">Manganese ( mg)</td>
                    <td style="border: 1px solid #0000"></td>
                    <td style="border: 1px solid #0000"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000">Molybdenum ( ug)</td>
                    <td style="border: 1px solid #0000"></td>
                    <td style="border: 1px solid #0000"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000">Phosphorus (mg)</td>
                    <td style="border: 1px solid #0000"></td>
                    <td style="border: 1px solid #0000"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000">Zinc ( mg)</td>
                    <td style="border: 1px solid #0000"></td>
                    <td style="border: 1px solid #0000"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000">Selenium (ug)</td>
                    <td style="border: 1px solid #0000"></td>
                    <td style="border: 1px solid #0000"></td>
                </tr>
                <tr><td></td></tr>
                <tr>
                    <td colspan="2">* % en relación a la Dosis Diaria Recomendada</td>
                </tr>
            </table>
            <table>
                <tr><th style="font-weight:bold">11.- HACCP ( Hazard Analysis and Critical Control Point) or CERTIFICATIONS(*)</th></tr>
                <tr><td></td></tr>
                <tr>
                    <td></td>
                    <td>YES</td>
                    <td>NO</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Do you have HACCP?</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                    <td></td>
                    <td colspan="4" rowspan="2" style="border: 1px solid #0000;vertical-align: top">If YES, Indicate CCP ( Critical control point) and attach Monograph of Process.</td>
                </tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr>
                    <td></td>
                    <td>YES</td>
                    <td>NO</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Do you have other certifications?</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                    <td></td>
                    <td colspan="4" rowspan="2" style="border: 1px solid #0000;vertical-align: top">If YES, Attach updated certificates</td>
                </tr>
            </table>
            <br>
            <table>
                <tr><th style="font-weight:bold">12.-MULTIRESIDUE STATEMENT(**)</th></tr>
                <tr><td></td></tr>
                <tr><td>MYCOTOXIN</td></tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Total Aflatoxins  (B1, B2, G1, G2)(ppb)</td>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Aflatoxina M1(ppb)</td>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Zearalenone(ppb)</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Patulin(ppb)</td>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Ochratoxin(ppb)</td>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Deoxynivalenol(ppb)</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Fumomisinas(ppb)</td>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word"></td>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word"></td>
                </tr>
                <tr><td></td></tr>
                <tr><td>HEAVY METALS</td></tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Zn(mg/kg final product)</td>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Pb(mg/kg final product)</td>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Cd(mg/kg final product)</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Hg(mg/kg final product)</td>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Sn(mg/kg final product)</td>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Cu(mg/kg final product)</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Ars(mg/kg final product)</td>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">Se(mg/kg final product)</td>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word"></td>
                </tr>
                <tr><td></td></tr>
                <tr><td>VETERINARY DRUGS</td></tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">chloramphenicol(ug/kg)</td>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">tetracycline(ug/kg)</td>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">quinolones(ug/kg)</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word">sulfonamides(ug/kg)</td>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word"></td>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word"></td>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word"></td>
                    <td style="border: 1px solid #0000;width: 230px; word-wrap:break-word"></td>
                </tr>
            </table>
            <table>
                <tr><td>PESTICIDES(mg/kg)</td></tr>
                <tr>
                    <td colspan="9" style="border: 1px solid #0000;">Fresh fruits and vegetables, nuts, meat (pork, beef, sheep, poultry), milk, eggs, beans, oats, rice and wheat:</td>
                </tr>
                <tr><td></td></tr>
                <tr><td style="border: 1px solid #0000;">Dioxin / furan(pg EQT/OMS/g fat):</td></tr>
                <tr><td></td></tr>
                <tr><td style="border: 1px solid #0000;">STEROIDS(ug/kg):</td></tr>
            </table>
            <br><br>
            <table>
                <tr><th style="font-weight:bold">13.- OTHER ANALYSIS(**)</th></tr>
                <tr><td></td></tr>
                <tr>
                    <td style="border: 1px solid #0000;">Gluten Free</td>
                    <th>YES</th>
                    <th>NO</th>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Is the product Gluten Free?</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                    <td></td>
                    <td colspan="2" rowspan="2" style="border: 1px solid #0000;vertical-align: top">If yes, Attach Analysis</td>
                </tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr>
                    <td style="border: 1px solid #0000;">Hidroxianthracene</td>
                    <th>YES</th>
                    <th>NO</th>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Does it contain Hidrxianthracene?</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                    <td></td>
                    <td colspan="2" rowspan="2" style="border: 1px solid #0000;vertical-align: top">If yes, Attach Analysis</td>
                </tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr>
                    <td style="border: 1px solid #0000;">Aloine</td>
                    <th>YES</th>
                    <th>NO</th>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">Does it contain Aloine?</td>
                    <td style="border: 1px solid #0000;"></td>
                    <td style="border: 1px solid #0000;"></td>
                    <td></td>
                    <td colspan="2" rowspan="2" style="border: 1px solid #0000;vertical-align: top">If yes, Attach Analysis</td>
                </tr>
            </table>
            <!--table>
                <tr><td rowspan="22" style="font-weight:bold;color:#ff0000">14. FLOW CHART</td></tr>
                <tr><td rowspan="22" style="font-weight:bold;">15.- LABEL DESIGN(*): Please send in a pdf file</td></tr>
            </table-->
            <table>
                <tr><td style="font-weight:bold;color:#ff0000">14. FLOW CHART</td></tr>
                @for ($i = 0; $i < 21; $i++)
                <tr><td></td></tr>
                @endfor
                <tr><td style="font-weight:bold;">15.- LABEL DESIGN(*): Please send in a pdf file</td></tr>
                @for ($i = 0; $i < 21; $i++)
                <tr><td></td></tr>
                @endfor
            </table>
            <table>
                <tr><th>TABLA DE REVISIONES</th></tr>
                <tr><td></td></tr>
                <tr>
                    <td style="border: 1px solid #0000;font-weight:bold;background-color:#C0C0C0">Numero de Revisión</td>
                    <td style="border: 1px solid #0000;font-weight:bold;background-color:#C0C0C0" colspan="2">Fecha de revisión</td>
                    <td style="border: 1px solid #0000;font-weight:bold;background-color:#C0C0C0" colspan="5">Descripción del cambio</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;">000</td>
                    <td style="border: 1px solid #0000;" colspan="2">{{ date('d-m-Y') }}</td>
                    <td style="border: 1px solid #0000;" colspan="5">Versión Inicial</td>
                </tr>
                <tr><td></td></tr>
                <tr>
                    <td style="border: 1px solid #0000;" colspan="3">Preparado por:</td>
                    <td style="border: 1px solid #0000;" colspan="5">Aprobado por:</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #0000;" colspan="3">Gestión y Desarrollo Aseguramiento Calidad  Importaciones</td>
                    <td style="border: 1px solid #0000;" colspan="5">Sub Gerente  Aseguramiento calidad Cencosud</td>
                </tr>
            </table>
        </body>
    </html>