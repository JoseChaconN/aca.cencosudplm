<?php

namespace App\Http\Controllers;

use App\Exports\FichaTecnicaImportadoExcel;
use App\Exports\FormatoCargaMasivaProductosImportadosExcel;
use App\Exports\PlanillaSolicitudImportadoExcel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExcelImport;
use App\Imports\FichaTecnicaProductosImportadosImport;
use App\Imports\FormatoCargaMasivaProductosImportadosImport;
use App\Models\BibliotecaDocumentos;
use App\Models\ListadoDocumentos;
use Spatie\Activitylog\Facades\LogBatch;

use App\Models\Seccion;
use App\Models\Pais;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\SolicitudProspectoProductosImportadosAca;
use App\Models\ProductosSolicitudImportadosAca;
use App\Models\ProductosSolicitudImportadosAca2;
use App\Models\User;
use App\Models\VersionesProductosSolicitudImportadosAca;
use Spatie\Permission\Models\Role;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Facades\Auth;

use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

class ProspectosAcaImportadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=[];
        $secciones_usuario = User::with('secciones_aca')->find(Auth::user()->id);                
        $data['secciones'] = $secciones_usuario->secciones_aca;#Seccion::where('status' , '=' , 1)->orderBy('nombre')->get();
        $data['marcas'] = Producto::select('marca')->where('status' , '=' , 1)->orderBy('marca')->groupBy('marca')->get();
        return view('prospectos-importados.nuevo-prospecto', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(empty($request->input('nombre_proveedor')) && empty($request->input('rut_proveedor'))){
            $request->validate([
                'id_proveedor' => 'required',
            ]);
        }
        
        $nuevaSolicitudId = null;
        try {
            DB::transaction(function () use ($request, &$nuevaSolicitudId) {
                // Crear el pedido (tabla padre)
                if(empty($request->input('nombre_proveedor')) && empty($request->input('rut_proveedor'))){
                    $proveedor = Proveedor::find($request->input('id_proveedor'));
                }else{
                    #PROVEEDOR NUEVO
                    $rut_proveedor =  str_replace(['.', '-', ','], '', $request->input('rut_proveedor'));
                    $proveedor = Proveedor::where('nombre',strtoupper($request->input('nombre_proveedor')))->where('rut',$rut_proveedor)->latest()->first();
                    if(empty($proveedor->id)){
                       $proveedor = Proveedor::create([
                            'nombre' => strtoupper($request->input('nombre_proveedor')),
                            'rut' => $rut_proveedor,
                        ]);
                    }
                }
                
                $solicitud = SolicitudProspectoProductosImportadosAca::create([
                    'n_solicitud' => time().mt_rand(0, 99999),
                    'id_creador' => Auth::user()->id,
                    'id_comercial' => Auth::user()->id,
                    'status' => 1,
                    'id_proveedor' => $proveedor->id,
                    'nombre_proveedor' => $proveedor->nombre,
                    'rut_proveedor' => $proveedor->rut,
                ]);
                #INSERT DE PRODUCTOS
                if(!empty($request->file('formato_masivo'))){
                    #ew ExcelImport($request, $ficha_excel[$value],$value);
                    #($request, $formato_excel,$id_solicitud,$id_proveedor)
                    #Excel::import($request, $request->file('formato_masivo'),$solicitud->id,$proveedor->id);
                    $import = new FormatoCargaMasivaProductosImportadosImport($request, $request->file('formato_masivo'),$solicitud->id,$proveedor->id);

                    // Importar datos utilizando la instancia creada
                    Excel::import($import, $request->file('formato_masivo'));
                }else{
                    // Crear ítems de pedido (tabla hijo)
                    $seccion_producto_array = $request->input('seccion_producto');
                    $sap_producto_array = $request->input('sap_producto');
                    foreach ($request->input('nombre_producto') as $key => $productoData) {
                        // Asociar el ítem de pedido con el pedido
                        $seccion = Seccion::find($seccion_producto_array[$key]);
                        $producto_prospecto=ProductosSolicitudImportadosAca::create([
                            'id_solicitud' => $solicitud->id,
                            'id_proveedor' => $request->input('id_proveedor'),
                            'product_name' => $productoData,
                            'id_seccion' => $seccion_producto_array[$key],
                            'seccion' => $seccion->nombre,
                            'sap' => $sap_producto_array[$key],
                            'version' => '0000',
                        ]);
                        $obs_producto_prospecto=ProductosSolicitudImportadosAca2::create([
                            'id_solicitud' => $solicitud->id,
                            'id_producto' => $producto_prospecto->id,
                        ]);
                    }
                }
                $nuevaSolicitudId = $solicitud->id;
            });
            return redirect()->route('prospectos-importados.edit',$nuevaSolicitudId)->with('notification_type', 'success')->with('notification_message', 'Solicitud creada con exito!');
        
        } catch (\Exception $e) {
            // Manejar la excepción o responder con un mensaje de error
            return redirect()->route('prospectos-importados.create')->with('notification_type', 'danger')->with('notification_message', 'Error al crear el prospecto: ' . $e->getMessage());
            #return redirect()->route('orders.index')->with('error', 'Error al crear el pedido: ' . $e->getMessage());
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['secciones'] = Seccion::where('status' , '=' , 1)->orderBy('nombre')->get();
        $data['paises'] = Pais::orderBy('nombre')->get();
        $data['prospecto'] = SolicitudProspectoProductosImportadosAca::with('productos_solicitud_prospecto.obs','productos_solicitud_prospecto.versiones')->findOrFail($id);
        $data['certificaciones_fijas'] = ListadoDocumentos::where('mostrar_prospecto_importados', 1)->where('tipo_documento', 2)->get();

        foreach ($data['prospecto']->productos_solicitud_prospecto as $producto) {
            $producto_q = ProductosSolicitudImportadosAca::find($producto->id);            
            foreach ($data['certificaciones_fijas'] as $certificacion) {
                $certificacion_exist = BibliotecaDocumentos::where('id_prospecto_importado',$producto->id)->where('id_documento',$certificacion->id)->latest()->first();
                if(!empty($certificacion_exist->id_documento)){
                    $data['certificaciones_fijas_producto'][$producto->id][$certificacion_exist->id_documento] = $certificacion_exist;
                    $adjunto_certificacion_fija = $certificacion_exist->getMedia('certificaciones_fijas_producto_importado')->last();
                    if(!empty($adjunto_certificacion_fija->id)){
                        $data['adjunto_certificaciones_fijas_producto'][$producto->id][$certificacion_exist->id_documento] = ['id' => $adjunto_certificacion_fija->id , 'url' => $adjunto_certificacion_fija->getUrl()];
                    }
                }
            }
        }
        return view('prospectos-importados.edit-prospecto', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            
            DB::transaction(function () use ($request, &$id) {
                LogBatch::startBatch();
                /** @var \App\Models\User */
                $user = Auth::user();
                $solicitud = SolicitudProspectoProductosImportadosAca::find($id);
                $old_data = $solicitud->getOriginal();
                $estado_cl = $request->input('estado_cl');
                $solicitud->update([
                    'estado_solicitud' => $request->input('estado_solicitud'),
                    'id_calidad' => $request->input('id_calidad'),
                    'id_comercial' => $request->input('id_comercial'),
                    'nombre_proveedor' => $request->input('nombre_proveedor'),
                    'rut_proveedor' => $request->input('rut_proveedor'),
                ]);
                /////////UPDATE PARA CALIDAD/////////
                dd($estado_cl);
                if($user->hasRole('calidad')){
                    if(!in_array(1,$estado_cl) && $request->input('status') != 1){
                        $solicitud->update([
                            'status' => 2
                        ]);
                        activity()
                        ->performedOn($solicitud)
                        ->causedBy(Auth::user())
                        ->log('Solicitud Cerrada');
                    }
                    if($request->input('status') == 1){
                        $solicitud->update([
                            'status' => 1
                        ]);
                        activity()
                        ->performedOn($solicitud)
                        ->causedBy(Auth::user())
                        ->log('Solicitud Abierta');
                    }
                }
                /////////UPDATE PARA COMERCIAL//////
                $id_producto=$request->input('id_producto');
                $nombre_producto=$request->input('product_name');
                $sap_producto = $request->input('sap_producto');
                if($user->hasRole('comercial')){
                    foreach ($id_producto as $key => $value) {
                        $producto=ProductosSolicitudImportadosAca::find($value);
                        $producto->update([
                            'product_name' => $nombre_producto[$value],
                            'sap' => $sap_producto[$value],
                        ]);
                    }
                }
                if($user->hasRole('calidad')){
                    
                    #########SI EXISTE ARCHIVO EXCEL ESE SE GUARDA PRIMERO###############

                    #Variables
                        $nueva_version = $request->input('nueva_version');
                        $id_producto = $request->input('id_producto');
                        $ficha_excel = $request->file('ficha_excel');
                        $sap_producto = $request->input('sap_producto');
                        $product_name = $request->input('product_name');
                        $product_name_spanish = $request->input('product_name_spanish');
                        $claims_origin = $request->input('claims_origin');
                        $comments = $request->input('comments');
                        $name_organic_certifying_number = $request->input('name_organic_certifying_number');
                        $plant_number_factory = $request->input('plant_number_factory');
                        $net_weight = $request->input('net_weight');
                        $drained_weight = $request->input('drained_weight');
                        $units_x_packaging = $request->input('units_x_packaging');
                        $country = $request->input('country');
                        $milking_country = $request->input('milking_country');
                        $expiration_date = $request->input('expiration_date');
                        $name_adress_manufacturer = $request->input('name_adress_manufacturer');
                        $shelf_life = $request->input('shelf_life');
                        $upc_bar_code = $request->input('upc_bar_code');
                        $storage_conditions = $request->input('storage_conditions');
                        $method_preparation = $request->input('method_preparation');
                        $name_supplier = $request->input('name_supplier');
                        $ingredients = $request->input('ingredients');
                        $porcent_organic_ingredients = $request->input('porcent_organic_ingredients');
                        $porcent_characterizing_ingredients = $request->input('porcent_characterizing_ingredients');
                        $name_additive = $request->input('name_additive');
                        $porcent_additive = $request->input('porcent_additive');
                        $quantity_additive = $request->input('quantity_additive');
                        $indicate_additive_code = $request->input('indicate_additive_code');
                        $indicate_additive_functionality = $request->input('indicate_additive_functionality');
                        $vegetable_oil_fat_used = $request->input('vegetable_oil_fat_used');
                        $trans_fats_hydrogenated_origin = $request->input('trans_fats_hydrogenated_origin');
                        $spices_herbs_used = $request->input('spices_herbs_used');
                        $quantity_sweetener_per_100_gr_ml = $request->input('quantity_sweetener_per_100_gr_ml');
                        $flavourings_aroma_natural_artificial = $request->input('flavourings_aroma_natural_artificial');
                        $quantity_x_m_s_g = $request->input('quantity_x_m_s_g');
                        $quantity_caffeine = $request->input('quantity_caffeine');
                        $any_extract_used = $request->input('any_extract_used');
                        $origin_gelatin = $request->input('origin_gelatin');
                        $brix_final_product = $request->input('brix_final_product');
                        $brix_final_product_without_added_sugar = $request->input('brix_final_product_without_added_sugar');
                        $brix_fruit_greater_proportion_drink = $request->input('brix_fruit_greater_proportion_drink');
                        $names_colourings = $request->input('names_colourings');
                        $minimum_porcent_cocoa_solids = $request->input('minimum_porcent_cocoa_solids');
                        $porcent_cocoa_butter_cocoa_mass = $request->input('porcent_cocoa_butter_cocoa_mass');
                        $contain_potential_allergens = $request->input('contain_potential_allergens');
                        $list_contain_potential_allergens = $request->input('list_contain_potential_allergens');
                        $cereals_gluten = $request->input('cereals_gluten');
                        $crustacean_products = $request->input('crustacean_products');
                        $egg_derivatives = $request->input('egg_derivatives');
                        $fish_derivatives = $request->input('fish_derivatives');
                        $peanuts_soy_derivatives = $request->input('peanuts_soy_derivatives');
                        $milk_dairy_derivatives = $request->input('milk_dairy_derivatives');
                        $nuts_derivatives = $request->input('nuts_derivatives');
                        $sulfites_derivatives = $request->input('sulfites_derivatives');
                        $health_certificate = $request->input('health_certificate');
                        $health_certificate_file = $request->input('health_certificate_file');
                        $organic_certification = $request->input('organic_certification');
                        $organic_certification_file = $request->input('organic_certification_file');
                        $certification_free_afp = $request->input('certification_free_afp');
                        $free_afp_file = $request->input('free_afp_file');
                        $thermograph = $request->input('thermograph');
                        $gmo_information = $request->input('gmo_information');
                        $list_gmo_information = $request->input('list_gmo_information');
                        $total_plate_count = $request->input('total_plate_count');
                        $coliform = $request->input('coliform');
                        $e_coli = $request->input('e_coli');
                        $e_coli_100 = $request->input('e_coli_100');
                        $e_coli_0157_h7 = $request->input('e_coli_0157_h7');
                        $campylobacter = $request->input('campylobacter');
                        $bacillus_cereus = $request->input('bacillus_cereus');
                        $staphylococcus = $request->input('staphylococcus');
                        $clostridium_perfringens = $request->input('clostridium_perfringens');
                        $listeria_monocytogenes = $request->input('listeria_monocytogenes');
                        $enterobacteria = $request->input('enterobacteria');
                        $mold = $request->input('mold');
                        $yeast = $request->input('yeast');
                        $mold_count = $request->input('mold_count');
                        $yeast_count = $request->input('yeast_count');
                        $salmonella_25 = $request->input('salmonella_25');
                        $salmonella_50 = $request->input('salmonella_50');
                        $lactobacillus = $request->input('lactobacillus');
                        $aerobic_anaerobic_mesophilic_microorganisms = $request->input('aerobic_anaerobic_mesophilic_microorganisms');
                        $aerobic_anaerobic_thermophilic_microorganisms = $request->input('aerobic_anaerobic_thermophilic_microorganisms');
                        $thermophilic_commercial_sterility = $request->input('thermophilic_commercial_sterility');
                        $anaerobic_spores_reducing_sulfites = $request->input('anaerobic_spores_reducing_sulfites');
                        $cronobacter_10g = $request->input('cronobacter_10g');
                        $ph = $request->input('ph');
                        $porcent_aw = $request->input('porcent_aw');
                        $type_primary_packaging = $request->input('type_primary_packaging');
                        $type_secundary_packaging = $request->input('type_secundary_packaging');
                        $type_controls_sealing_air_tightness_primary_packaging = $request->input('type_controls_sealing_air_tightness_primary_packaging');
                        $product_type = $request->input('product_type');
                        $serving_size = $request->input('serving_size');
                        $servings_per_container = $request->input('servings_per_container');
                        $energy_100 = $request->input('energy_100');
                        $energy_serving = $request->input('energy_serving');
                        $proteins_100 = $request->input('proteins_100');
                        $proteins_serving = $request->input('proteins_serving');
                        $total_fat_100 = $request->input('total_fat_100');
                        $total_fat_serving = $request->input('total_fat_serving');
                        $satured_fat_100 = $request->input('satured_fat_100');
                        $satured_fat_serving = $request->input('satured_fat_serving');
                        $trans_fat_100 = $request->input('trans_fat_100');
                        $trans_fat_serving = $request->input('trans_fat_serving');
                        $monosatured_fat_100 = $request->input('monosatured_fat_100');
                        $monosatured_fat_serving = $request->input('monosatured_fat_serving');
                        $polyunsatured_fat_100 = $request->input('polyunsatured_fat_100');
                        $polyunsatured_fat_serving = $request->input('polyunsatured_fat_serving');
                        $cholesterol_100 = $request->input('cholesterol_100');
                        $cholesterol_serving = $request->input('cholesterol_serving');
                        $total_carbohydrate_100 = $request->input('total_carbohydrate_100');
                        $total_carbohydrate_serving = $request->input('total_carbohydrate_serving');
                        $available_carbohydrates_100 = $request->input('available_carbohydrates_100');
                        $available_carbohydrates_serving = $request->input('available_carbohydrates_serving');
                        $total_sugars_100 = $request->input('total_sugars_100');
                        $total_sugars_serving = $request->input('total_sugars_serving');
                        $sucrose_100 = $request->input('sucrose_100');
                        $sucrose_serving = $request->input('sucrose_serving');
                        $lactos_100 = $request->input('lactos_100');
                        $lactos_serving = $request->input('lactos_serving');
                        $poliols_100 = $request->input('poliols_100');
                        $poliols_serving = $request->input('poliols_serving');
                        $total_dietary_fiber_100 = $request->input('total_dietary_fiber_100');
                        $total_dietary_fiber_serving = $request->input('total_dietary_fiber_serving');
                        $soluble_fiber_100 = $request->input('soluble_fiber_100');
                        $soluble_fiber_serving = $request->input('soluble_fiber_serving');
                        $insoluble_fiber_100 = $request->input('insoluble_fiber_100');
                        $insoluble_fiber_serving = $request->input('insoluble_fiber_serving');
                        $sodium_100 = $request->input('sodium_100');
                        $sodium_serving = $request->input('sodium_serving');
                        $serving_size_reconstitued = $request->input('serving_size_reconstitued');
                        $servings_per_container_reconstitued = $request->input('servings_per_container_reconstitued');
                        $energy_100_reconstitued = $request->input('energy_100_reconstitued');
                        $energy_serving_reconstitued = $request->input('energy_serving_reconstitued');
                        $energy_serving_reconstitued_r = $request->input('energy_serving_reconstitued_r');
                        $proteins_100_reconstitued = $request->input('proteins_100_reconstitued');
                        $proteins_serving_reconstitued = $request->input('proteins_serving_reconstitued');
                        $proteins_serving_reconstitued_r = $request->input('proteins_serving_reconstitued_r');
                        $total_fat_100_reconstitued = $request->input('total_fat_100_reconstitued');
                        $total_fat_serving_reconstitued = $request->input('total_fat_serving_reconstitued');
                        $total_fat_serving_reconstitued_r = $request->input('total_fat_serving_reconstitued_r');
                        $satured_fat_100_reconstitued = $request->input('satured_fat_100_reconstitued');
                        $satured_fat_serving_reconstitued = $request->input('satured_fat_serving_reconstitued');
                        $satured_fat_serving_reconstitued_r = $request->input('satured_fat_serving_reconstitued_r');
                        $trans_fat_100_reconstitued = $request->input('trans_fat_100_reconstitued');
                        $trans_fat_serving_reconstitued = $request->input('trans_fat_serving_reconstitued');
                        $trans_fat_serving_reconstitued_r = $request->input('trans_fat_serving_reconstitued_r');
                        $monosatured_fat_100_reconstitued = $request->input('monosatured_fat_100_reconstitued');
                        $monosatured_fat_serving_reconstitued = $request->input('monosatured_fat_serving_reconstitued');
                        $monosatured_fat_serving_reconstitued_r = $request->input('monosatured_fat_serving_reconstitued_r');
                        $polyunsatured_fat_100_reconstitued = $request->input('polyunsatured_fat_100_reconstitued');
                        $polyunsatured_fat_serving_reconstitued = $request->input('polyunsatured_fat_serving_reconstitued');
                        $polyunsatured_fat_serving_reconstitued_r = $request->input('polyunsatured_fat_serving_reconstitued_r');
                        $cholesterol_100_reconstitued = $request->input('cholesterol_100_reconstitued');
                        $cholesterol_serving_reconstitued = $request->input('cholesterol_serving_reconstitued');
                        $cholesterol_serving_reconstitued_r = $request->input('cholesterol_serving_reconstitued_r');
                        $total_carbohydrate_100_reconstitued = $request->input('total_carbohydrate_100_reconstitued');
                        $total_carbohydrate_serving_reconstitued = $request->input('total_carbohydrate_serving_reconstitued');
                        $total_carbohydrate_serving_reconstitued_r = $request->input('total_carbohydrate_serving_reconstitued_r');
                        $available_carbohydrates_100_reconstitued = $request->input('available_carbohydrates_100_reconstitued');
                        $available_carbohydrates_serving_reconstitued = $request->input('available_carbohydrates_serving_reconstitued');
                        $available_carbohydrates_serving_reconstitued_r = $request->input('available_carbohydrates_serving_reconstitued_r');
                        $total_sugars_100_reconstitued = $request->input('total_sugars_100_reconstitued');
                        $total_sugars_serving_reconstitued = $request->input('total_sugars_serving_reconstitued');
                        $total_sugars_serving_reconstitued_r = $request->input('total_sugars_serving_reconstitued_r');
                        $sucrose_100_reconstitued = $request->input('sucrose_100_reconstitued');
                        $sucrose_serving_reconstitued = $request->input('sucrose_serving_reconstitued');
                        $sucrose_serving_reconstitued_r = $request->input('sucrose_serving_reconstitued_r');
                        $lactos_100_reconstitued = $request->input('lactos_100_reconstitued');
                        $lactos_serving_reconstitued = $request->input('lactos_serving_reconstitued');
                        $lactos_serving_reconstitued_r = $request->input('lactos_serving_reconstitued_r');
                        $poliols_100_reconstitued = $request->input('poliols_100_reconstitued');
                        $poliols_serving_reconstitued = $request->input('poliols_serving_reconstitued');
                        $poliols_serving_reconstitued_r = $request->input('poliols_serving_reconstitued_r');
                        $total_dietary_fiber_100_reconstitued = $request->input('total_dietary_fiber_100_reconstitued');
                        $total_dietary_fiber_serving_reconstitued = $request->input('total_dietary_fiber_serving_reconstitued');
                        $total_dietary_fiber_serving_reconstitued_r = $request->input('total_dietary_fiber_serving_reconstitued_r');
                        $soluble_fiber_100_reconstitued = $request->input('soluble_fiber_100_reconstitued');
                        $soluble_fiber_serving_reconstitued = $request->input('soluble_fiber_serving_reconstitued');
                        $soluble_fiber_serving_reconstitued_r = $request->input('soluble_fiber_serving_reconstitued_r');
                        $insoluble_fiber_100_reconstitued = $request->input('insoluble_fiber_100_reconstitued');
                        $insoluble_fiber_serving_reconstitued = $request->input('insoluble_fiber_serving_reconstitued');
                        $insoluble_fiber_serving_reconstitued_r = $request->input('insoluble_fiber_serving_reconstitued_r');
                        $sodium_100_reconstitued = $request->input('sodium_100_reconstitued');
                        $sodium_serving_reconstitued = $request->input('sodium_serving_reconstitued');
                        $sodium_serving_reconstitued_r = $request->input('sodium_serving_reconstitued_r');
                        $vitamin_a_100 = $request->input('vitamin_a_100');
                        $vitamin_a_serving = $request->input('vitamin_a_serving');
                        $vitamin_c_100 = $request->input('vitamin_c_100');
                        $vitamin_c_serving = $request->input('vitamin_c_serving');
                        $vitamin_d_100 = $request->input('vitamin_d_100');
                        $vitamin_d_serving = $request->input('vitamin_d_serving');
                        $vitamin_e_100 = $request->input('vitamin_e_100');
                        $vitamin_e_serving = $request->input('vitamin_e_serving');
                        $vitamin_b1_100 = $request->input('vitamin_b1_100');
                        $vitamin_b1_serving = $request->input('vitamin_b1_serving');
                        $vitamin_b2_100 = $request->input('vitamin_b2_100');
                        $vitamin_b2_serving = $request->input('vitamin_b2_serving');
                        $niacin_100 = $request->input('niacin_100');
                        $niacin_serving = $request->input('niacin_serving');
                        $vitamin_b6_100 = $request->input('vitamin_b6_100');
                        $vitamin_b6_serving = $request->input('vitamin_b6_serving');
                        $folic_acid_100 = $request->input('folic_acid_100');
                        $folic_acid_serving = $request->input('folic_acid_serving');
                        $vitamin_b12_100 = $request->input('vitamin_b12_100');
                        $vitamin_b12_serving = $request->input('vitamin_b12_serving');
                        $pantothenic_acid_100 = $request->input('pantothenic_acid_100');
                        $pantothenic_acid_serving = $request->input('pantothenic_acid_serving');
                        $biotin_100 = $request->input('biotin_100');
                        $biotin_serving = $request->input('biotin_serving');
                        $choline_100 = $request->input('choline_100');
                        $choline_serving = $request->input('choline_serving');
                        $vitamin_k_100 = $request->input('vitamin_k_100');
                        $vitamin_k_serving = $request->input('vitamin_k_serving');
                        $betacarotene_100 = $request->input('betacarotene_100');
                        $betacarotene_serving = $request->input('betacarotene_serving');
                        $calcium_100 = $request->input('calcium_100');
                        $calcium_serving = $request->input('calcium_serving');
                        $chromium_100 = $request->input('chromium_100');
                        $chromium_serving = $request->input('chromium_serving');
                        $copper_100 = $request->input('copper_100');
                        $copper_serving = $request->input('copper_serving');
                        $yodo_100 = $request->input('yodo_100');
                        $yodo_serving = $request->input('yodo_serving');
                        $iron_100 = $request->input('iron_100');
                        $iron_serving = $request->input('iron_serving');
                        $magnesium_100 = $request->input('magnesium_100');
                        $magnesium_serving = $request->input('magnesium_serving');
                        $manganese_100 = $request->input('manganese_100');
                        $manganese_serving = $request->input('manganese_serving');
                        $molybdenum_100 = $request->input('molybdenum_100');
                        $molybdenum_serving = $request->input('molybdenum_serving');
                        $phosphorus_100 = $request->input('phosphorus_100');
                        $phosphorus_serving = $request->input('phosphorus_serving');
                        $zinc_100 = $request->input('zinc_100');
                        $zinc_serving = $request->input('zinc_serving');
                        $selenium_100 = $request->input('selenium_100');
                        $selenium_serving = $request->input('selenium_serving');
                        $total_aflatoxins = $request->input('total_aflatoxins');
                        $aflatoxina_m1 = $request->input('aflatoxina_m1');
                        $zearalenone = $request->input('zearalenone');
                        $patulin = $request->input('patulin');
                        $ochratoxin = $request->input('ochratoxin');
                        $deoxynivalenol = $request->input('deoxynivalenol');
                        $fumonisinas = $request->input('fumonisinas');
                        $zn = $request->input('zn');
                        $pb = $request->input('pb');
                        $cd = $request->input('cd');
                        $hg = $request->input('hg');
                        $sn = $request->input('sn');
                        $cu = $request->input('cu');
                        $ars = $request->input('ars');
                        $se = $request->input('se');
                        $chloramphenicol = $request->input('chloramphenicol');
                        $tetracycline = $request->input('tetracycline');
                        $quinolones = $request->input('quinolones');
                        $sulfonamides = $request->input('sulfonamides');
                        $pesticides = $request->input('pesticides');
                        $dioxin_furan = $request->input('dioxin_furan');
                        $steroids = $request->input('steroids');
                        $estado_cl = $request->input('estado_cl');
                        $observacion_solicitud = $request->input('observacion_solicitud');
                    #VARIABLES OBS
                        $sap_obs = $request->input('sap_obs');
                        $product_name_obs = $request->input('product_name_obs');
                        $claims_origin_obs = $request->input('claims_origin_obs');
                        $comments_obs = $request->input('comments_obs');
                        $name_organic_certifying_number_obs = $request->input('name_organic_certifying_number_obs');
                        $plant_number_factory_obs = $request->input('plant_number_factory_obs');
                        $net_weight_obs = $request->input('net_weight_obs');
                        $drained_weight_obs = $request->input('drained_weight_obs');
                        $units_x_packaging_obs = $request->input('units_x_packaging_obs');
                        $country_obs = $request->input('country_obs');
                        $milking_country_obs = $request->input('milking_country_obs');
                        $expiration_date_obs = $request->input('expiration_date_obs');
                        $name_adress_manufacturer_obs = $request->input('name_adress_manufacturer_obs');
                        $shelf_life_obs = $request->input('shelf_life_obs');
                        $upc_bar_code_obs = $request->input('upc_bar_code_obs');
                        $storage_conditions_obs = $request->input('storage_conditions_obs');
                        $method_preparation_obs = $request->input('method_preparation_obs');
                        $name_supplier_obs = $request->input('name_supplier_obs');
                        $ingredients_obs = $request->input('ingredients_obs');
                        $porcent_organic_ingredients_obs = $request->input('porcent_organic_ingredients_obs');
                        $porcent_characterizing_ingredients_obs = $request->input('porcent_characterizing_ingredients_obs');
                        $quantity_additive_obs = $request->input('quantity_additive_obs');
                        $vegetable_oil_fat_used_obs = $request->input('vegetable_oil_fat_used_obs');
                        $trans_fats_hydrogenated_origin_obs = $request->input('trans_fats_hydrogenated_origin_obs');
                        $spices_herbs_used_obs = $request->input('spices_herbs_used_obs');
                        $quantity_sweetener_per_100_gr_ml_obs = $request->input('quantity_sweetener_per_100_gr_ml_obs');
                        $flavourings_aroma_natural_artificial_obs = $request->input('flavourings_aroma_natural_artificial_obs');
                        $quantity_x_m_s_g_obs = $request->input('quantity_x_m_s_g_obs');
                        $quantity_caffeine_obs = $request->input('quantity_caffeine_obs');
                        $any_extract_used_obs = $request->input('any_extract_used_obs');
                        $origin_gelatin_obs = $request->input('origin_gelatin_obs');
                        $brix_final_product_obs = $request->input('brix_final_product_obs');
                        $brix_final_product_without_added_sugar_obs = $request->input('brix_final_product_without_added_sugar_obs');
                        $brix_fruit_greater_proportion_drink_obs = $request->input('brix_fruit_greater_proportion_drink_obs');
                        $names_colourings_obs = $request->input('names_colourings_obs');
                        $minimum_porcent_cocoa_solids_obs = $request->input('minimum_porcent_cocoa_solids_obs');
                        $porcent_cocoa_butter_cocoa_mass_obs = $request->input('porcent_cocoa_butter_cocoa_mass_obs');
                        $contain_potential_allergens_obs = $request->input('contain_potential_allergens_obs');
                        $list_contain_potential_allergens_obs = $request->input('list_contain_potential_allergens_obs');
                        $cereals_gluten_obs = $request->input('cereals_gluten_obs');
                        $crustacean_products_obs = $request->input('crustacean_products_obs');
                        $egg_derivatives_obs = $request->input('egg_derivatives_obs');
                        $fish_derivatives_obs = $request->input('fish_derivatives_obs');
                        $peanuts_soy_derivatives_obs = $request->input('peanuts_soy_derivatives_obs');
                        $milk_dairy_derivatives_obs = $request->input('milk_dairy_derivatives_obs');
                        $nuts_derivatives_obs = $request->input('nuts_derivatives_obs');
                        $sulfites_derivatives_obs = $request->input('sulfites_derivatives_obs');
                        $health_certificate_obs = $request->input('health_certificate_obs');
                        $organic_certification_obs = $request->input('organic_certification_obs');
                        $certification_free_afp_obs = $request->input('certification_free_afp_obs');
                        $thermograph_obs = $request->input('thermograph_obs');
                        $gmo_information_obs = $request->input('gmo_information_obs');
                        $list_gmo_information_obs = $request->input('list_gmo_information_obs');
                        $total_plate_count_obs = $request->input('total_plate_count_obs');
                        $staphylococcus_obs = $request->input('staphylococcus_obs');
                        $mold_obs = $request->input('mold_obs');
                        $coliform_obs = $request->input('coliform_obs');
                        $clostridium_perfringens_obs = $request->input('clostridium_perfringens_obs');
                        $yeast_obs = $request->input('yeast_obs');
                        $e_coli_obs = $request->input('e_coli_obs');
                        $listeria_monocytogenes_obs = $request->input('listeria_monocytogenes_obs');
                        $salmonella_obs = $request->input('salmonella_obs');
                        $e_coli_0157_h7_obs = $request->input('e_coli_0157_h7_obs');
                        $trichinella_spiralis_obs = $request->input('trichinella_spiralis_obs');
                        $lactobacillus_obs = $request->input('lactobacillus_obs');
                        $campylobacter_obs = $request->input('campylobacter_obs');
                        $enterobacteria_obs = $request->input('enterobacteria_obs');
                        $thermophilic_commercial_sterility_obs = $request->input('thermophilic_commercial_sterility_obs');
                        $bacillus_cereus_obs = $request->input('bacillus_cereus_obs');
                        $ph_obs = $request->input('ph_obs');
                        $porcent_aw_obs = $request->input('porcent_aw_obs');
                        $type_primary_packaging_obs = $request->input('type_primary_packaging_obs');
                        $type_secundary_packaging_obs = $request->input('type_secundary_packaging_obs');
                        $type_controls_sealing_air_tightness_primary_packaging_obs = $request->input('type_controls_sealing_air_tightness_primary_packaging_obs');
                        $product_type_obs = $request->input('product_type_obs');
                        $serving_size_obs = $request->input('serving_size_obs');
                        $servings_per_container_obs = $request->input('servings_per_container_obs');
                        $energy_obs = $request->input('energy_obs');
                        $proteins_obs = $request->input('proteins_obs');
                        $total_fat_obs = $request->input('total_fat_obs');
                        $satured_fat_obs = $request->input('satured_fat_obs');
                        $trans_fat_obs = $request->input('trans_fat_obs');
                        $monosatured_fat_obs = $request->input('monosatured_fat_obs');
                        $polyunsatured_fat_obs = $request->input('polyunsatured_fat_obs');
                        $cholesterol_obs = $request->input('cholesterol_obs');
                        $total_carbohydrate_obs = $request->input('total_carbohydrate_obs');
                        $available_carbohydrates_obs = $request->input('available_carbohydrates_obs');
                        $total_sugars_obs = $request->input('total_sugars_obs');
                        $sucrose_obs = $request->input('sucrose_obs');
                        $lactos_obs = $request->input('lactos_obs');
                        $poliols_obs = $request->input('poliols_obs');
                        $total_dietary_fiber_obs = $request->input('total_dietary_fiber_obs');
                        $soluble_fiber_obs = $request->input('soluble_fiber_obs');
                        $insoluble_fiber_obs = $request->input('insoluble_fiber_obs');
                        $sodium_obs = $request->input('sodium_obs');
                        $vitamin_a_obs = $request->input('vitamin_a_obs');
                        $vitamin_c_obs = $request->input('vitamin_c_obs');
                        $vitamin_d_obs = $request->input('vitamin_d_obs');
                        $vitamin_e_obs = $request->input('vitamin_e_obs');
                        $vitamin_b1_obs = $request->input('vitamin_b1_obs');
                        $vitamin_b2_obs = $request->input('vitamin_b2_obs');
                        $niacin_obs = $request->input('niacin_obs');
                        $vitamin_b6_obs = $request->input('vitamin_b6_obs');
                        $folic_acid_obs = $request->input('folic_acid_obs');
                        $vitamin_b12_obs = $request->input('vitamin_b12_obs');
                        $pantothenic_acid_obs = $request->input('pantothenic_acid_obs');
                        $biotin_obs = $request->input('biotin_obs');
                        $choline_obs = $request->input('choline_obs');
                        $vitamin_k_obs = $request->input('vitamin_k_obs');
                        $betacarotene_obs = $request->input('betacarotene_obs');
                        $calcium_obs = $request->input('calcium_obs');
                        $chromium_obs = $request->input('chromium_obs');
                        $copper_obs = $request->input('copper_obs');
                        $yodo_obs = $request->input('yodo_obs');
                        $iron_obs = $request->input('iron_obs');
                        $magnesium_obs = $request->input('magnesium_obs');
                        $manganese_obs = $request->input('manganese_obs');
                        $molybdenum_obs = $request->input('molybdenum_obs');
                        $phosphorus_obs = $request->input('phosphorus_obs');
                        $zinc_obs = $request->input('zinc_obs');
                        $selenium_obs = $request->input('selenium_obs');
                        $haccp_obs = $request->input('haccp_obs');
                        $others_certifications_obs = $request->input('others_certifications_obs');
                        $total_aflatoxins_obs = $request->input('total_aflatoxins_obs');
                        $aflatoxina_m1_obs = $request->input('aflatoxina_m1_obs');
                        $zearalenone_obs = $request->input('zearalenone_obs');
                        $patulin_obs = $request->input('patulin_obs');
                        $ochratoxin_obs = $request->input('ochratoxin_obs');
                        $deoxynivalenol_obs = $request->input('deoxynivalenol_obs');
                        $fumonisinas_obs = $request->input('fumonisinas_obs');
                        $zn_obs = $request->input('zn_obs');
                        $pb_obs = $request->input('pb_obs');
                        $cd_obs = $request->input('cd_obs');
                        $hg_obs = $request->input('hg_obs');
                        $sn_obs = $request->input('sn_obs');
                        $cu_obs = $request->input('cu_obs');
                        $ars_obs = $request->input('ars_obs');
                        $se_obs = $request->input('se_obs');
                        $chloramphenicol_obs = $request->input('chloramphenicol_obs');
                        $tetracycline_obs = $request->input('tetracycline_obs');
                        $quinolones_obs = $request->input('quinolones_obs');
                        $sulfonamides_obs = $request->input('sulfonamides_obs');
                        $pesticides_obs = $request->input('pesticides_obs');
                        $dioxin_furan_obs = $request->input('dioxin_furan_obs');
                        $steroids_obs = $request->input('steroids_obs');
                        $gluten_free_obs = $request->input('gluten_free_obs');
                        $hidroxianthracene_obs = $request->input('hidroxianthracene_obs');
                        $aloine_obs = $request->input('aloine_obs');
                        
                    ###VARIABLES ARCHIVOS
                        $id_certificacion_fija = $request->input('id_certificacion_fija');
                        $id_exist_certificacion_fija = $request->input('id_exist_certificacion_fija');
                        $nombre_laboratorio_f = $request->input('nombre_laboratorio_f');
                        $numero_certificado_f = $request->input('numero_certificado_f');
                        $adjunto_f = $request->file('adjunto_f');
                        $flow_chart_file = $request->file('flow_chart_file');
                        $label_design_file = $request->file('label_design_file');

                    foreach ($id_producto as $key => $value) {
                        $producto=ProductosSolicitudImportadosAca::find($value);
                        $old_data_prod = $producto->getOriginal();
                        #dd($old_data_prod['product_name']);
                        #########SI EXISTE ARCHIVO EXCEL ESE ES EL QUE GUARDA ###############
                        if(!empty($nueva_version[$value]) && $nueva_version[$value] == 1){
                            
                            $nueva_version = VersionesProductosSolicitudImportadosAca::create([
                                'id_solicitud' => $id,
                                'producto_id' => $value,
                                'version' => $producto->version,
                                'sap' => $old_data_prod['sap'],
                                'product_name' => $old_data_prod['product_name'],
                                'product_name_spanish' => $old_data_prod['product_name_spanish'],
                                'claims_origin' => $old_data_prod['claims_origin'],
                                'comments' => $old_data_prod['comments'],
                                'name_organic_certifying_number' => $old_data_prod['name_organic_certifying_number'],
                                'plant_number_factory' => $old_data_prod['plant_number_factory'],
                                'net_weight' => $old_data_prod['net_weight'],
                                'drained_weight' => $old_data_prod['drained_weight'],
                                'units_x_packaging' => $old_data_prod['units_x_packaging'],
                                'country' => $old_data_prod['country'],
                                'milking_country' => $old_data_prod['milking_country'],
                                'expiration_date' => $old_data_prod['expiration_date'],
                                'name_adress_manufacturer' => $old_data_prod['name_adress_manufacturer'],
                                'shelf_life' => $old_data_prod['shelf_life'],
                                'upc_bar_code' => $old_data_prod['upc_bar_code'],
                                'storage_conditions' => $old_data_prod['storage_conditions'],
                                'method_preparation' => $old_data_prod['method_preparation'],
                                'name_supplier' => $old_data_prod['name_supplier'],
                                'ingredients' => $old_data_prod['ingredients'],
                                'porcent_organic_ingredients' => $old_data_prod['porcent_organic_ingredients'],
                                'porcent_characterizing_ingredients' => $old_data_prod['porcent_characterizing_ingredients'],
                                'name_additive' => $old_data_prod['name_additive'],
                                'porcent_additive' => $old_data_prod['porcent_additive'],
                                'quantity_additive' => $old_data_prod['quantity_additive'],
                                'indicate_additive_code' => $old_data_prod['indicate_additive_code'],
                                'indicate_additive_functionality' => $old_data_prod['indicate_additive_functionality'],
                                'vegetable_oil_fat_used' => $old_data_prod['vegetable_oil_fat_used'],
                                'trans_fats_hydrogenated_origin' => $old_data_prod['trans_fats_hydrogenated_origin'],
                                'spices_herbs_used' => $old_data_prod['spices_herbs_used'],
                                'quantity_sweetener_per_100_gr_ml' => $old_data_prod['quantity_sweetener_per_100_gr_ml'],
                                'flavourings_aroma_natural_artificial' => $old_data_prod['flavourings_aroma_natural_artificial'],
                                'quantity_x_m_s_g' => $old_data_prod['quantity_x_m_s_g'],
                                'quantity_caffeine' => $old_data_prod['quantity_caffeine'],
                                'any_extract_used' => $old_data_prod['any_extract_used'],
                                'origin_gelatin' => $old_data_prod['origin_gelatin'],
                                'brix_final_product' => $old_data_prod['brix_final_product'],
                                'brix_final_product_without_added_sugar' => $old_data_prod['brix_final_product_without_added_sugar'],
                                'brix_fruit_greater_proportion_drink' => $old_data_prod['brix_fruit_greater_proportion_drink'],
                                'names_colourings' => $old_data_prod['names_colourings'],
                                'minimum_porcent_cocoa_solids' => $old_data_prod['minimum_porcent_cocoa_solids'],
                                'porcent_cocoa_butter_cocoa_mass' => $old_data_prod['porcent_cocoa_butter_cocoa_mass'],
                                'contain_potential_allergens' => $old_data_prod['contain_potential_allergens'],
                                'cereals_gluten' => $old_data_prod['cereals_gluten'],
                                'crustacean_products' => $old_data_prod['crustacean_products'],
                                'egg_derivatives' => $old_data_prod['egg_derivatives'],
                                'fish_derivatives' => $old_data_prod['fish_derivatives'],
                                'peanuts_soy_derivatives' => $old_data_prod['peanuts_soy_derivatives'],
                                'milk_dairy_derivatives' => $old_data_prod['milk_dairy_derivatives'],
                                'nuts_derivatives' => $old_data_prod['nuts_derivatives'],
                                'sulfites_derivatives' => $old_data_prod['sulfites_derivatives'],
                                'total_plate_count' => $old_data_prod['total_plate_count'],
                                'coliform' => $old_data_prod['coliform'],
                                'e_coli' => $old_data_prod['e_coli'],
                                'e_coli_100' => $old_data_prod['e_coli_100'],
                                'e_coli_0157_h7' => $old_data_prod['e_coli_0157_h7'],
                                'campylobacter' => $old_data_prod['campylobacter'],
                                'bacillus_cereus' => $old_data_prod['bacillus_cereus'],
                                'staphylococcus' => $old_data_prod['staphylococcus'],
                                'clostridium_perfringens' => $old_data_prod['clostridium_perfringens'],
                                'listeria_monocytogenes' => $old_data_prod['listeria_monocytogenes'],
                                'enterobacteria' => $old_data_prod['enterobacteria'],
                                'mold' => $old_data_prod['mold'],
                                'yeast' => $old_data_prod['yeast'],
                                'mold_count' => $old_data_prod['mold_count'],
                                'yeast_count' => $old_data_prod['yeast_count'],
                                'salmonella_25' => $old_data_prod['salmonella_25'],
                                'salmonella_50' => $old_data_prod['salmonella_50'],
                                'lactobacillus' => $old_data_prod['lactobacillus'],
                                'aerobic_anaerobic_mesophilic_microorganisms' => $old_data_prod['aerobic_anaerobic_mesophilic_microorganisms'],
                                'aerobic_anaerobic_thermophilic_microorganisms' => $old_data_prod['aerobic_anaerobic_thermophilic_microorganisms'],
                                'thermophilic_commercial_sterility' => $old_data_prod['thermophilic_commercial_sterility'],
                                'anaerobic_spores_reducing_sulfites' => $old_data_prod['anaerobic_spores_reducing_sulfites'],
                                'cronobacter_10g' => $old_data_prod['cronobacter_10g'],
                                'ph' => $old_data_prod['ph'],
                                'porcent_aw' => $old_data_prod['porcent_aw'],
                                'type_primary_packaging' => $old_data_prod['type_primary_packaging'],
                                'type_secundary_packaging' => $old_data_prod['type_secundary_packaging'],
                                'type_controls_sealing_air_tightness_primary_packaging' => $old_data_prod['type_controls_sealing_air_tightness_primary_packaging'],
                                'product_type' => $old_data_prod['product_type'],
                                'serving_size' => $old_data_prod['serving_size'],
                                'servings_per_container' => $old_data_prod['servings_per_container'],
                                'energy_100' => $old_data_prod['energy_100'],
                                'energy_serving' => $old_data_prod['energy_serving'],
                                'proteins_100' => $old_data_prod['proteins_100'],
                                'proteins_serving' => $old_data_prod['proteins_serving'],
                                'total_fat_100' => $old_data_prod['total_fat_100'],
                                'total_fat_serving' => $old_data_prod['total_fat_serving'],
                                'satured_fat_100' => $old_data_prod['satured_fat_100'],
                                'satured_fat_serving' => $old_data_prod['satured_fat_serving'],
                                'trans_fat_100' => $old_data_prod['trans_fat_100'],
                                'trans_fat_serving' => $old_data_prod['trans_fat_serving'],
                                'monosatured_fat_100' => $old_data_prod['monosatured_fat_100'],
                                'monosatured_fat_serving' => $old_data_prod['monosatured_fat_serving'],
                                'polyunsatured_fat_100' => $old_data_prod['polyunsatured_fat_100'],
                                'polyunsatured_fat_serving' => $old_data_prod['polyunsatured_fat_serving'],
                                'cholesterol_100' => $old_data_prod['cholesterol_100'],
                                'cholesterol_serving' => $old_data_prod['cholesterol_serving'],
                                'total_carbohydrate_100' => $old_data_prod['total_carbohydrate_100'],
                                'total_carbohydrate_serving' => $old_data_prod['total_carbohydrate_serving'],
                                'available_carbohydrates_100' => $old_data_prod['available_carbohydrates_100'],
                                'available_carbohydrates_serving' => $old_data_prod['available_carbohydrates_serving'],
                                'total_sugars_100' => $old_data_prod['total_sugars_100'],
                                'total_sugars_serving' => $old_data_prod['total_sugars_serving'],
                                'sucrose_100' => $old_data_prod['sucrose_100'],
                                'sucrose_serving' => $old_data_prod['sucrose_serving'],
                                'lactos_100' => $old_data_prod['lactos_100'],
                                'lactos_serving' => $old_data_prod['lactos_serving'],
                                'poliols_100' => $old_data_prod['poliols_100'],
                                'poliols_serving' => $old_data_prod['poliols_serving'],
                                'total_dietary_fiber_100' => $old_data_prod['total_dietary_fiber_100'],
                                'total_dietary_fiber_serving' => $old_data_prod['total_dietary_fiber_serving'],
                                'soluble_fiber_100' => $old_data_prod['soluble_fiber_100'],
                                'soluble_fiber_serving' => $old_data_prod['soluble_fiber_serving'],
                                'insoluble_fiber_100' => $old_data_prod['insoluble_fiber_100'],
                                'insoluble_fiber_serving' => $old_data_prod['insoluble_fiber_serving'],
                                'sodium_100' => $old_data_prod['sodium_100'],
                                'sodium_serving' => $old_data_prod['sodium_serving'],
                                'serving_size_reconstitued' => $old_data_prod['serving_size_reconstitued'],
                                'servings_per_container_reconstitued' => $old_data_prod['servings_per_container_reconstitued'],
                                'energy_100_reconstitued' => $old_data_prod['energy_100_reconstitued'],
                                'energy_serving_reconstitued' => $old_data_prod['energy_serving_reconstitued'],
                                'energy_serving_reconstitued_r' => $old_data_prod['energy_serving_reconstitued_r'],
                                'proteins_100_reconstitued' => $old_data_prod['proteins_100_reconstitued'],
                                'proteins_serving_reconstitued' => $old_data_prod['proteins_serving_reconstitued'],
                                'proteins_serving_reconstitued_r' => $old_data_prod['proteins_serving_reconstitued_r'],
                                'total_fat_100_reconstitued' => $old_data_prod['total_fat_100_reconstitued'],
                                'total_fat_serving_reconstitued' => $old_data_prod['total_fat_serving_reconstitued'],
                                'total_fat_serving_reconstitued_r' => $old_data_prod['total_fat_serving_reconstitued_r'],
                                'satured_fat_100_reconstitued' => $old_data_prod['satured_fat_100_reconstitued'],
                                'satured_fat_serving_reconstitued' => $old_data_prod['satured_fat_serving_reconstitued'],
                                'satured_fat_serving_reconstitued_r' => $old_data_prod['satured_fat_serving_reconstitued_r'],
                                'trans_fat_100_reconstitued' => $old_data_prod['trans_fat_100_reconstitued'],
                                'trans_fat_serving_reconstitued' => $old_data_prod['trans_fat_serving_reconstitued'],
                                'trans_fat_serving_reconstitued_r' => $old_data_prod['trans_fat_serving_reconstitued_r'],
                                'monosatured_fat_100_reconstitued' => $old_data_prod['monosatured_fat_100_reconstitued'],
                                'monosatured_fat_serving_reconstitued' => $old_data_prod['monosatured_fat_serving_reconstitued'],
                                'monosatured_fat_serving_reconstitued_r' => $old_data_prod['monosatured_fat_serving_reconstitued_r'],
                                'polyunsatured_fat_100_reconstitued' => $old_data_prod['polyunsatured_fat_100_reconstitued'],
                                'polyunsatured_fat_serving_reconstitued' => $old_data_prod['polyunsatured_fat_serving_reconstitued'],
                                'polyunsatured_fat_serving_reconstitued_r' => $old_data_prod['polyunsatured_fat_serving_reconstitued_r'],
                                'cholesterol_100_reconstitued' => $old_data_prod['cholesterol_100_reconstitued'],
                                'cholesterol_serving_reconstitued' => $old_data_prod['cholesterol_serving_reconstitued'],
                                'cholesterol_serving_reconstitued_r' => $old_data_prod['cholesterol_serving_reconstitued_r'],
                                'total_carbohydrate_100_reconstitued' => $old_data_prod['total_carbohydrate_100_reconstitued'],
                                'total_carbohydrate_serving_reconstitued' => $old_data_prod['total_carbohydrate_serving_reconstitued'],
                                'total_carbohydrate_serving_reconstitued_r' => $old_data_prod['total_carbohydrate_serving_reconstitued_r'],
                                'available_carbohydrates_100_reconstitued' => $old_data_prod['available_carbohydrates_100_reconstitued'],
                                'available_carbohydrates_serving_reconstitued' => $old_data_prod['available_carbohydrates_serving_reconstitued'],
                                'available_carbohydrates_serving_reconstitued_r' => $old_data_prod['available_carbohydrates_serving_reconstitued_r'],
                                'total_sugars_100_reconstitued' => $old_data_prod['total_sugars_100_reconstitued'],
                                'total_sugars_serving_reconstitued' => $old_data_prod['total_sugars_serving_reconstitued'],
                                'total_sugars_serving_reconstitued_r' => $old_data_prod['total_sugars_serving_reconstitued_r'],
                                'sucrose_100_reconstitued' => $old_data_prod['sucrose_100_reconstitued'],
                                'sucrose_serving_reconstitued' => $old_data_prod['sucrose_serving_reconstitued'],
                                'sucrose_serving_reconstitued_r' => $old_data_prod['sucrose_serving_reconstitued_r'],
                                'lactos_100_reconstitued' => $old_data_prod['lactos_100_reconstitued'],
                                'lactos_serving_reconstitued' => $old_data_prod['lactos_serving_reconstitued'],
                                'lactos_serving_reconstitued_r' => $old_data_prod['lactos_serving_reconstitued_r'],
                                'poliols_100_reconstitued' => $old_data_prod['poliols_100_reconstitued'],
                                'poliols_serving_reconstitued' => $old_data_prod['poliols_serving_reconstitued'],
                                'poliols_serving_reconstitued_r' => $old_data_prod['poliols_serving_reconstitued_r'],
                                'total_dietary_fiber_100_reconstitued' => $old_data_prod['total_dietary_fiber_100_reconstitued'],
                                'total_dietary_fiber_serving_reconstitued' => $old_data_prod['total_dietary_fiber_serving_reconstitued'],
                                'total_dietary_fiber_serving_reconstitued_r' => $old_data_prod['total_dietary_fiber_serving_reconstitued_r'],
                                'soluble_fiber_100_reconstitued' => $old_data_prod['soluble_fiber_100_reconstitued'],
                                'soluble_fiber_serving_reconstitued' => $old_data_prod['soluble_fiber_serving_reconstitued'],
                                'soluble_fiber_serving_reconstitued_r' => $old_data_prod['soluble_fiber_serving_reconstitued_r'],
                                'insoluble_fiber_100_reconstitued' => $old_data_prod['insoluble_fiber_100_reconstitued'],
                                'insoluble_fiber_serving_reconstitued' => $old_data_prod['insoluble_fiber_serving_reconstitued'],
                                'insoluble_fiber_serving_reconstitued_r' => $old_data_prod['insoluble_fiber_serving_reconstitued_r'],
                                'sodium_100_reconstitued' => $old_data_prod['sodium_100_reconstitued'],
                                'sodium_serving_reconstitued' => $old_data_prod['sodium_serving_reconstitued'],
                                'sodium_serving_reconstitued_r' => $old_data_prod['sodium_serving_reconstitued_r'],
                                'vitamin_a_100' => $old_data_prod['vitamin_a_100'],
                                'vitamin_a_serving' => $old_data_prod['vitamin_a_serving'],
                                'vitamin_c_100' => $old_data_prod['vitamin_c_100'],
                                'vitamin_c_serving' => $old_data_prod['vitamin_c_serving'],
                                'vitamin_d_100' => $old_data_prod['vitamin_d_100'],
                                'vitamin_d_serving' => $old_data_prod['vitamin_d_serving'],
                                'vitamin_e_100' => $old_data_prod['vitamin_e_100'],
                                'vitamin_e_serving' => $old_data_prod['vitamin_e_serving'],
                                'vitamin_b1_100' => $old_data_prod['vitamin_b1_100'],
                                'vitamin_b1_serving' => $old_data_prod['vitamin_b1_serving'],
                                'vitamin_b2_100' => $old_data_prod['vitamin_b2_100'],
                                'vitamin_b2_serving' => $old_data_prod['vitamin_b2_serving'],
                                'niacin_100' => $old_data_prod['niacin_100'],
                                'niacin_serving' => $old_data_prod['niacin_serving'],
                                'vitamin_b6_100' => $old_data_prod['vitamin_b6_100'],
                                'vitamin_b6_serving' => $old_data_prod['vitamin_b6_serving'],
                                'folic_acid_100' => $old_data_prod['folic_acid_100'],
                                'folic_acid_serving' => $old_data_prod['folic_acid_serving'],
                                'vitamin_b12_100' => $old_data_prod['vitamin_b12_100'],
                                'vitamin_b12_serving' => $old_data_prod['vitamin_b12_serving'],
                                'pantothenic_acid_100' => $old_data_prod['pantothenic_acid_100'],
                                'pantothenic_acid_serving' => $old_data_prod['pantothenic_acid_serving'],
                                'biotin_100' => $old_data_prod['biotin_100'],
                                'biotin_serving' => $old_data_prod['biotin_serving'],
                                'choline_100' => $old_data_prod['choline_100'],
                                'choline_serving' => $old_data_prod['choline_serving'],
                                'vitamin_k_100' => $old_data_prod['vitamin_k_100'],
                                'vitamin_k_serving' => $old_data_prod['vitamin_k_serving'],
                                'betacarotene_100' => $old_data_prod['betacarotene_100'],
                                'betacarotene_serving' => $old_data_prod['betacarotene_serving'],
                                'calcium_100' => $old_data_prod['calcium_100'],
                                'calcium_serving' => $old_data_prod['calcium_serving'],
                                'chromium_100' => $old_data_prod['chromium_100'],
                                'chromium_serving' => $old_data_prod['chromium_serving'],
                                'copper_100' => $old_data_prod['copper_100'],
                                'copper_serving' => $old_data_prod['copper_serving'],
                                'yodo_100' => $old_data_prod['yodo_100'],
                                'yodo_serving' => $old_data_prod['yodo_serving'],
                                'iron_100' => $old_data_prod['iron_100'],
                                'iron_serving' => $old_data_prod['iron_serving'],
                                'magnesium_100' => $old_data_prod['magnesium_100'],
                                'magnesium_serving' => $old_data_prod['magnesium_serving'],
                                'manganese_100' => $old_data_prod['manganese_100'],
                                'manganese_serving' => $old_data_prod['manganese_serving'],
                                'molybdenum_100' => $old_data_prod['molybdenum_100'],
                                'molybdenum_serving' => $old_data_prod['molybdenum_serving'],
                                'phosphorus_100' => $old_data_prod['phosphorus_100'],
                                'phosphorus_serving' => $old_data_prod['phosphorus_serving'],
                                'zinc_100' => $old_data_prod['zinc_100'],
                                'zinc_serving' => $old_data_prod['zinc_serving'],
                                'selenium_100' => $old_data_prod['selenium_100'],
                                'selenium_serving' => $old_data_prod['selenium_serving'],
                                'total_aflatoxins' => $old_data_prod['total_aflatoxins'],
                                'aflatoxina_m1' => $old_data_prod['aflatoxina_m1'],
                                'zearalenone' => $old_data_prod['zearalenone'],
                                'patulin' => $old_data_prod['patulin'],
                                'ochratoxin' => $old_data_prod['ochratoxin'],
                                'deoxynivalenol' => $old_data_prod['deoxynivalenol'],
                                'fumonisinas' => $old_data_prod['fumonisinas'],
                                'zn' => $old_data_prod['zn'],
                                'pb' => $old_data_prod['pb'],
                                'cd' => $old_data_prod['cd'],
                                'hg' => $old_data_prod['hg'],
                                'sn' => $old_data_prod['sn'],
                                'cu' => $old_data_prod['cu'],
                                'ars' => $old_data_prod['ars'],
                                'se' => $old_data_prod['se'],
                                'chloramphenicol' => $old_data_prod['chloramphenicol'],
                                'tetracycline' => $old_data_prod['tetracycline'],
                                'quinolones' => $old_data_prod['quinolones'],
                                'sulfonamides' => $old_data_prod['sulfonamides'],
                                'pesticides' => $old_data_prod['pesticides'],
                                'dioxin_furan' => $old_data_prod['dioxin_furan'],
                                'steroids' => $old_data_prod['steroids'],
                                'estado_cl' => $old_data_prod['estado_cl'],
                                'observacion_solicitud' => $old_data_prod['observacion_solicitud'],

                            ]);
                            $ultima_version = $producto->version;#VersionesProductosSolicitudImportadosAca::where('producto_id',$value)->latest()->first();
                            
                            // Obtener el número de versión de la última versión
                            $num_version = intval(substr($ultima_version, -4));
                            
                            // Incrementar el número de versión en 1
                            $nueva_version = str_pad($num_version + 1, 4, '0', STR_PAD_LEFT);
                            $producto->update([
                                'version' => $nueva_version,
                            ]);
                        }
                        if(!empty($ficha_excel[$value])){                            
                            // Crear una instancia de ExcelImport y pasar los parámetros necesarios
                            $import = new FichaTecnicaProductosImportadosImport($request, $ficha_excel[$value],$value);

                            // Importar datos utilizando la instancia creada
                            Excel::import($import, $ficha_excel[$value]);
                        }else{
                            
                            $producto->update([
                                'sap' => $sap_producto[$value],
                                'product_name' => $product_name[$value],
                                'product_name_spanish' => $product_name_spanish[$value],
                                'claims_origin' => $claims_origin[$value],
                                'comments' => $comments[$value],
                                'name_organic_certifying_number' => $name_organic_certifying_number[$value],
                                'plant_number_factory' => $plant_number_factory[$value],
                                'net_weight' => $net_weight[$value],
                                'drained_weight' => $drained_weight[$value],
                                'units_x_packaging' => $units_x_packaging[$value],
                                'country' => $country[$value],
                                'milking_country' => $milking_country[$value],
                                'expiration_date' => $expiration_date[$value],
                                'name_adress_manufacturer' => $name_adress_manufacturer[$value],
                                'shelf_life' => $shelf_life[$value],
                                'upc_bar_code' => $upc_bar_code[$value],
                                'storage_conditions' => $storage_conditions[$value],
                                'method_preparation' => $method_preparation[$value],
                                'name_supplier' => $name_supplier[$value],
                                'ingredients' => $ingredients[$value],
                                'porcent_organic_ingredients' => $porcent_organic_ingredients[$value],
                                'porcent_characterizing_ingredients' => $porcent_characterizing_ingredients[$value],
                                'name_additive' => $name_additive[$value],
                                'porcent_additive' => $porcent_additive[$value],
                                'quantity_additive' => $quantity_additive[$value],
                                'indicate_additive_code' => $indicate_additive_code[$value],
                                'indicate_additive_functionality' => $indicate_additive_functionality[$value],
                                'vegetable_oil_fat_used' => $vegetable_oil_fat_used[$value],
                                'trans_fats_hydrogenated_origin' => $trans_fats_hydrogenated_origin[$value],
                                'spices_herbs_used' => $spices_herbs_used[$value],
                                'quantity_sweetener_per_100_gr_ml' => $quantity_sweetener_per_100_gr_ml[$value],
                                'flavourings_aroma_natural_artificial' => $flavourings_aroma_natural_artificial[$value],
                                'quantity_x_m_s_g' => $quantity_x_m_s_g[$value],
                                'quantity_caffeine' => $quantity_caffeine[$value],
                                'any_extract_used' => $any_extract_used[$value],
                                'origin_gelatin' => $origin_gelatin[$value],
                                'brix_final_product' => $brix_final_product[$value],
                                'brix_final_product_without_added_sugar' => $brix_final_product_without_added_sugar[$value],
                                'brix_fruit_greater_proportion_drink' => $brix_fruit_greater_proportion_drink[$value],
                                'names_colourings' => $names_colourings[$value],
                                'minimum_porcent_cocoa_solids' => $minimum_porcent_cocoa_solids[$value],
                                'porcent_cocoa_butter_cocoa_mass' => $porcent_cocoa_butter_cocoa_mass[$value],
                                'contain_potential_allergens' => $contain_potential_allergens[$value],
                                ##'list_contain_potential_allergens' => $list_contain_potential_allergens[$value],
                                'cereals_gluten' => $cereals_gluten[$value],
                                'crustacean_products' => $crustacean_products[$value],
                                'egg_derivatives' => $egg_derivatives[$value],
                                'fish_derivatives' => $fish_derivatives[$value],
                                'peanuts_soy_derivatives' => $peanuts_soy_derivatives[$value],
                                'milk_dairy_derivatives' => $milk_dairy_derivatives[$value],
                                'nuts_derivatives' => $nuts_derivatives[$value],
                                'sulfites_derivatives' => $sulfites_derivatives[$value],
                                #'health_certificate' => $health_certificate[$value],
                                #'health_certificate_file' => $health_certificate_file[$value],
                                #'organic_certification' => $organic_certification[$value],
                                #'organic_certification_file' => $organic_certification_file[$value],
                                #'certification_free_afp' => $certification_free_afp[$value],
                                #'free_afp_file' => $free_afp_file[$value],
                                #'thermograph' => $thermograph[$value],
                                #'gmo_information' => $gmo_information[$value],
                                #'list_gmo_information' => $list_gmo_information[$value],
                                'total_plate_count' => $total_plate_count[$value],
                                'coliform' => $coliform[$value],
                                'e_coli' => $e_coli[$value],
                                'e_coli_100' => $e_coli_100[$value],
                                'e_coli_0157_h7' => $e_coli_0157_h7[$value],
                                'campylobacter' => $campylobacter[$value],
                                'bacillus_cereus' => $bacillus_cereus[$value],
                                'staphylococcus' => $staphylococcus[$value],
                                'clostridium_perfringens' => $clostridium_perfringens[$value],
                                'listeria_monocytogenes' => $listeria_monocytogenes[$value],
                                'enterobacteria' => $enterobacteria[$value],
                                'mold' => $mold[$value],
                                'yeast' => $yeast[$value],
                                'mold_count' => $mold_count[$value],
                                'yeast_count' => $yeast_count[$value],
                                'salmonella_25' => $salmonella_25[$value],
                                'salmonella_50' => $salmonella_50[$value],
                                'lactobacillus' => $lactobacillus[$value],
                                'aerobic_anaerobic_mesophilic_microorganisms' => $aerobic_anaerobic_mesophilic_microorganisms[$value],
                                'aerobic_anaerobic_thermophilic_microorganisms' => $aerobic_anaerobic_thermophilic_microorganisms[$value],
                                'thermophilic_commercial_sterility' => $thermophilic_commercial_sterility[$value],
                                'anaerobic_spores_reducing_sulfites' => $anaerobic_spores_reducing_sulfites[$value],
                                'cronobacter_10g' => $cronobacter_10g[$value],
                                'ph' => $ph[$value],
                                'porcent_aw' => $porcent_aw[$value],
                                'type_primary_packaging' => $type_primary_packaging[$value],
                                'type_secundary_packaging' => $type_secundary_packaging[$value],
                                'type_controls_sealing_air_tightness_primary_packaging' => $type_controls_sealing_air_tightness_primary_packaging[$value],
                                'product_type' => $product_type[$value],
                                'serving_size' => $serving_size[$value],
                                'servings_per_container' => $servings_per_container[$value],
                                'energy_100' => $energy_100[$value],
                                'energy_serving' => $energy_serving[$value],
                                'proteins_100' => $proteins_100[$value],
                                'proteins_serving' => $proteins_serving[$value],
                                'total_fat_100' => $total_fat_100[$value],
                                'total_fat_serving' => $total_fat_serving[$value],
                                'satured_fat_100' => $satured_fat_100[$value],
                                'satured_fat_serving' => $satured_fat_serving[$value],
                                'trans_fat_100' => $trans_fat_100[$value],
                                'trans_fat_serving' => $trans_fat_serving[$value],
                                'monosatured_fat_100' => $monosatured_fat_100[$value],
                                'monosatured_fat_serving' => $monosatured_fat_serving[$value],
                                'polyunsatured_fat_100' => $polyunsatured_fat_100[$value],
                                'polyunsatured_fat_serving' => $polyunsatured_fat_serving[$value],
                                'cholesterol_100' => $cholesterol_100[$value],
                                'cholesterol_serving' => $cholesterol_serving[$value],
                                'total_carbohydrate_100' => $total_carbohydrate_100[$value],
                                'total_carbohydrate_serving' => $total_carbohydrate_serving[$value],
                                'available_carbohydrates_100' => $available_carbohydrates_100[$value],
                                'available_carbohydrates_serving' => $available_carbohydrates_serving[$value],
                                'total_sugars_100' => $total_sugars_100[$value],
                                'total_sugars_serving' => $total_sugars_serving[$value],
                                'sucrose_100' => $sucrose_100[$value],
                                'sucrose_serving' => $sucrose_serving[$value],
                                'lactos_100' => $lactos_100[$value],
                                'lactos_serving' => $lactos_serving[$value],
                                'poliols_100' => $poliols_100[$value],
                                'poliols_serving' => $poliols_serving[$value],
                                'total_dietary_fiber_100' => $total_dietary_fiber_100[$value],
                                'total_dietary_fiber_serving' => $total_dietary_fiber_serving[$value],
                                'soluble_fiber_100' => $soluble_fiber_100[$value],
                                'soluble_fiber_serving' => $soluble_fiber_serving[$value],
                                'insoluble_fiber_100' => $insoluble_fiber_100[$value],
                                'insoluble_fiber_serving' => $insoluble_fiber_serving[$value],
                                'sodium_100' => $sodium_100[$value],
                                'sodium_serving' => $sodium_serving[$value],
                                'serving_size_reconstitued' => $serving_size_reconstitued[$value],
                                'servings_per_container_reconstitued' => $servings_per_container_reconstitued[$value],
                                'energy_100_reconstitued' => $energy_100_reconstitued[$value],
                                'energy_serving_reconstitued' => $energy_serving_reconstitued[$value],
                                'energy_serving_reconstitued_r' => $energy_serving_reconstitued_r[$value],
                                'proteins_100_reconstitued' => $proteins_100_reconstitued[$value],
                                'proteins_serving_reconstitued' => $proteins_serving_reconstitued[$value],
                                'proteins_serving_reconstitued_r' => $proteins_serving_reconstitued_r[$value],
                                'total_fat_100_reconstitued' => $total_fat_100_reconstitued[$value],
                                'total_fat_serving_reconstitued' => $total_fat_serving_reconstitued[$value],
                                'total_fat_serving_reconstitued_r' => $total_fat_serving_reconstitued_r[$value],
                                'satured_fat_100_reconstitued' => $satured_fat_100_reconstitued[$value],
                                'satured_fat_serving_reconstitued' => $satured_fat_serving_reconstitued[$value],
                                'satured_fat_serving_reconstitued_r' => $satured_fat_serving_reconstitued_r[$value],
                                'trans_fat_100_reconstitued' => $trans_fat_100_reconstitued[$value],
                                'trans_fat_serving_reconstitued' => $trans_fat_serving_reconstitued[$value],
                                'trans_fat_serving_reconstitued_r' => $trans_fat_serving_reconstitued_r[$value],
                                'monosatured_fat_100_reconstitued' => $monosatured_fat_100_reconstitued[$value],
                                'monosatured_fat_serving_reconstitued' => $monosatured_fat_serving_reconstitued[$value],
                                'monosatured_fat_serving_reconstitued_r' => $monosatured_fat_serving_reconstitued_r[$value],
                                'polyunsatured_fat_100_reconstitued' => $polyunsatured_fat_100_reconstitued[$value],
                                'polyunsatured_fat_serving_reconstitued' => $polyunsatured_fat_serving_reconstitued[$value],
                                'polyunsatured_fat_serving_reconstitued_r' => $polyunsatured_fat_serving_reconstitued_r[$value],
                                'cholesterol_100_reconstitued' => $cholesterol_100_reconstitued[$value],
                                'cholesterol_serving_reconstitued' => $cholesterol_serving_reconstitued[$value],
                                'cholesterol_serving_reconstitued_r' => $cholesterol_serving_reconstitued_r[$value],
                                'total_carbohydrate_100_reconstitued' => $total_carbohydrate_100_reconstitued[$value],
                                'total_carbohydrate_serving_reconstitued' => $total_carbohydrate_serving_reconstitued[$value],
                                'total_carbohydrate_serving_reconstitued_r' => $total_carbohydrate_serving_reconstitued_r[$value],
                                'available_carbohydrates_100_reconstitued' => $available_carbohydrates_100_reconstitued[$value],
                                'available_carbohydrates_serving_reconstitued' => $available_carbohydrates_serving_reconstitued[$value],
                                'available_carbohydrates_serving_reconstitued_r' => $available_carbohydrates_serving_reconstitued_r[$value],
                                'total_sugars_100_reconstitued' => $total_sugars_100_reconstitued[$value],
                                'total_sugars_serving_reconstitued' => $total_sugars_serving_reconstitued[$value],
                                'total_sugars_serving_reconstitued_r' => $total_sugars_serving_reconstitued_r[$value],
                                'sucrose_100_reconstitued' => $sucrose_100_reconstitued[$value],
                                'sucrose_serving_reconstitued' => $sucrose_serving_reconstitued[$value],
                                'sucrose_serving_reconstitued_r' => $sucrose_serving_reconstitued_r[$value],
                                'lactos_100_reconstitued' => $lactos_100_reconstitued[$value],
                                'lactos_serving_reconstitued' => $lactos_serving_reconstitued[$value],
                                'lactos_serving_reconstitued_r' => $lactos_serving_reconstitued_r[$value],
                                'poliols_100_reconstitued' => $poliols_100_reconstitued[$value],
                                'poliols_serving_reconstitued' => $poliols_serving_reconstitued[$value],
                                'poliols_serving_reconstitued_r' => $poliols_serving_reconstitued_r[$value],
                                'total_dietary_fiber_100_reconstitued' => $total_dietary_fiber_100_reconstitued[$value],
                                'total_dietary_fiber_serving_reconstitued' => $total_dietary_fiber_serving_reconstitued[$value],
                                'total_dietary_fiber_serving_reconstitued_r' => $total_dietary_fiber_serving_reconstitued_r[$value],
                                'soluble_fiber_100_reconstitued' => $soluble_fiber_100_reconstitued[$value],
                                'soluble_fiber_serving_reconstitued' => $soluble_fiber_serving_reconstitued[$value],
                                'soluble_fiber_serving_reconstitued_r' => $soluble_fiber_serving_reconstitued_r[$value],
                                'insoluble_fiber_100_reconstitued' => $insoluble_fiber_100_reconstitued[$value],
                                'insoluble_fiber_serving_reconstitued' => $insoluble_fiber_serving_reconstitued[$value],
                                'insoluble_fiber_serving_reconstitued_r' => $insoluble_fiber_serving_reconstitued_r[$value],
                                'sodium_100_reconstitued' => $sodium_100_reconstitued[$value],
                                'sodium_serving_reconstitued' => $sodium_serving_reconstitued[$value],
                                'sodium_serving_reconstitued_r' => $sodium_serving_reconstitued_r[$value],
                                'vitamin_a_100' => $vitamin_a_100[$value],
                                'vitamin_a_serving' => $vitamin_a_serving[$value],
                                'vitamin_c_100' => $vitamin_c_100[$value],
                                'vitamin_c_serving' => $vitamin_c_serving[$value],
                                'vitamin_d_100' => $vitamin_d_100[$value],
                                'vitamin_d_serving' => $vitamin_d_serving[$value],
                                'vitamin_e_100' => $vitamin_e_100[$value],
                                'vitamin_e_serving' => $vitamin_e_serving[$value],
                                'vitamin_b1_100' => $vitamin_b1_100[$value],
                                'vitamin_b1_serving' => $vitamin_b1_serving[$value],
                                'vitamin_b2_100' => $vitamin_b2_100[$value],
                                'vitamin_b2_serving' => $vitamin_b2_serving[$value],
                                'niacin_100' => $niacin_100[$value],
                                'niacin_serving' => $niacin_serving[$value],
                                'vitamin_b6_100' => $vitamin_b6_100[$value],
                                'vitamin_b6_serving' => $vitamin_b6_serving[$value],
                                'folic_acid_100' => $folic_acid_100[$value],
                                'folic_acid_serving' => $folic_acid_serving[$value],
                                'vitamin_b12_100' => $vitamin_b12_100[$value],
                                'vitamin_b12_serving' => $vitamin_b12_serving[$value],
                                'pantothenic_acid_100' => $pantothenic_acid_100[$value],
                                'pantothenic_acid_serving' => $pantothenic_acid_serving[$value],
                                'biotin_100' => $biotin_100[$value],
                                'biotin_serving' => $biotin_serving[$value],
                                'choline_100' => $choline_100[$value],
                                'choline_serving' => $choline_serving[$value],
                                'vitamin_k_100' => $vitamin_k_100[$value],
                                'vitamin_k_serving' => $vitamin_k_serving[$value],
                                'betacarotene_100' => $betacarotene_100[$value],
                                'betacarotene_serving' => $betacarotene_serving[$value],
                                'calcium_100' => $calcium_100[$value],
                                'calcium_serving' => $calcium_serving[$value],
                                'chromium_100' => $chromium_100[$value],
                                'chromium_serving' => $chromium_serving[$value],
                                'copper_100' => $copper_100[$value],
                                'copper_serving' => $copper_serving[$value],
                                'yodo_100' => $yodo_100[$value],
                                'yodo_serving' => $yodo_serving[$value],
                                'iron_100' => $iron_100[$value],
                                'iron_serving' => $iron_serving[$value],
                                'magnesium_100' => $magnesium_100[$value],
                                'magnesium_serving' => $magnesium_serving[$value],
                                'manganese_100' => $manganese_100[$value],
                                'manganese_serving' => $manganese_serving[$value],
                                'molybdenum_100' => $molybdenum_100[$value],
                                'molybdenum_serving' => $molybdenum_serving[$value],
                                'phosphorus_100' => $phosphorus_100[$value],
                                'phosphorus_serving' => $phosphorus_serving[$value],
                                'zinc_100' => $zinc_100[$value],
                                'zinc_serving' => $zinc_serving[$value],
                                'selenium_100' => $selenium_100[$value],
                                'selenium_serving' => $selenium_serving[$value],
                                'total_aflatoxins' => $total_aflatoxins[$value],
                                'aflatoxina_m1' => $aflatoxina_m1[$value],
                                'zearalenone' => $zearalenone[$value],
                                'patulin' => $patulin[$value],
                                'ochratoxin' => $ochratoxin[$value],
                                'deoxynivalenol' => $deoxynivalenol[$value],
                                'fumonisinas' => $fumonisinas[$value],
                                'zn' => $zn[$value],
                                'pb' => $pb[$value],
                                'cd' => $cd[$value],
                                'hg' => $hg[$value],
                                'sn' => $sn[$value],
                                'cu' => $cu[$value],
                                'ars' => $ars[$value],
                                'se' => $se[$value],
                                'chloramphenicol' => $chloramphenicol[$value],
                                'tetracycline' => $tetracycline[$value],
                                'quinolones' => $quinolones[$value],
                                'sulfonamides' => $sulfonamides[$value],
                                'pesticides' => $pesticides[$value],
                                'dioxin_furan' => $dioxin_furan[$value],
                                'steroids' => $steroids[$value],
                                'estado_cl' => $estado_cl[$value],
                                'observacion_solicitud' => $observacion_solicitud[$value],
                            ]);
                            if($estado_cl[$value] > 1){
                                $producto->update(['fecha_cierre' => date('Y-m-d')]);
                            }
                            if($estado_cl[$value] == 1){
                                $producto->update(['fecha_cierre' => NULL]);
                            }
                            activity()
                            ->performedOn($producto)
                            ->causedBy(Auth::user())
                            ->withProperties(['old_data' => $old_data_prod, 'new_data' => $producto])
                            ->log('Prospecto Solicitud editado');
                            
                            ////OBSERVACIONES////
                            $obs_producto=ProductosSolicitudImportadosAca2::where('id_producto',$value);  
                            $obs_old_data_prod = $producto->getOriginal();                      
                            #$obs_old_data_prod = $obs_producto->getOriginal();
                            $obs_producto->update([
                                'sap' => (!empty($sap_obs[$value])) ? $sap_obs[$value] : NULL,
                                'product_name' => (!empty($product_name_obs[$value])) ? $product_name_obs[$value] : NULL,
                                'claims_origin' => (!empty($claims_origin_obs[$value])) ? $claims_origin_obs[$value] : NULL,
                                'comments' => (!empty($comments_obs[$value])) ? $comments_obs[$value] : NULL,
                                'name_organic_certifying_number' => (!empty($name_organic_certifying_number_obs[$value])) ? $name_organic_certifying_number_obs[$value] : NULL,
                                'plant_number_factory' => (!empty($plant_number_factory_obs[$value])) ? $plant_number_factory_obs[$value] : NULL,
                                'net_weight' => (!empty($net_weight_obs[$value])) ? $net_weight_obs[$value] : NULL,
                                'drained_weight' => (!empty($drained_weight_obs[$value])) ? $drained_weight_obs[$value] : NULL,
                                'units_x_packaging' => (!empty($units_x_packaging_obs[$value])) ? $units_x_packaging_obs[$value] : NULL,
                                'country' => (!empty($country_obs[$value])) ? $country_obs[$value] : NULL,
                                'milking_country' => (!empty($milking_country_obs[$value])) ? $milking_country_obs[$value] : NULL,
                                'expiration_date' => (!empty($expiration_date_obs[$value])) ? $expiration_date_obs[$value] : NULL,
                                'name_adress_manufacturer' => (!empty($name_adress_manufacturer_obs[$value])) ? $name_adress_manufacturer_obs[$value] : NULL,
                                'shelf_life' => (!empty($shelf_life_obs[$value])) ? $shelf_life_obs[$value] : NULL,
                                'upc_bar_code' => (!empty($upc_bar_code_obs[$value])) ? $upc_bar_code_obs[$value] : NULL,
                                'storage_conditions' => (!empty($storage_conditions_obs[$value])) ? $storage_conditions_obs[$value] : NULL,
                                'method_preparation' => (!empty($method_preparation_obs[$value])) ? $method_preparation_obs[$value] : NULL,
                                'name_supplier' => (!empty($name_supplier_obs[$value])) ? $name_supplier_obs[$value] : NULL,
                                'ingredients' => (!empty($ingredients_obs[$value])) ? $ingredients_obs[$value] : NULL,
                                'porcent_organic_ingredients' => (!empty($porcent_organic_ingredients_obs[$value])) ? $porcent_organic_ingredients_obs[$value] : NULL,
                                'porcent_characterizing_ingredients' => (!empty($porcent_characterizing_ingredients_obs[$value])) ? $porcent_characterizing_ingredients_obs[$value] : NULL,
                                'quantity_additive' => (!empty($quantity_additive_obs[$value])) ? $quantity_additive_obs[$value] : NULL,
                                'vegetable_oil_fat_used' => (!empty($vegetable_oil_fat_used_obs[$value])) ? $vegetable_oil_fat_used_obs[$value] : NULL,
                                'trans_fats_hydrogenated_origin' => (!empty($trans_fats_hydrogenated_origin_obs[$value])) ? $trans_fats_hydrogenated_origin_obs[$value] : NULL,
                                'spices_herbs_used' => (!empty($spices_herbs_used_obs[$value])) ? $spices_herbs_used_obs[$value] : NULL,
                                'quantity_sweetener_per_100_gr_ml' => (!empty($quantity_sweetener_per_100_gr_ml_obs[$value])) ? $quantity_sweetener_per_100_gr_ml_obs[$value] : NULL,
                                'flavourings_aroma_natural_artificial' => (!empty($flavourings_aroma_natural_artificial_obs[$value])) ? $flavourings_aroma_natural_artificial_obs[$value] : NULL,
                                'quantity_x_m_s_g' => (!empty($quantity_x_m_s_g_obs[$value])) ? $quantity_x_m_s_g_obs[$value] : NULL,
                                'quantity_caffeine' => (!empty($quantity_caffeine_obs[$value])) ? $quantity_caffeine_obs[$value] : NULL,
                                'any_extract_used' => (!empty($any_extract_used_obs[$value])) ? $any_extract_used_obs[$value] : NULL,
                                'origin_gelatin' => (!empty($origin_gelatin_obs[$value])) ? $origin_gelatin_obs[$value] : NULL,
                                'brix_final_product' => (!empty($brix_final_product_obs[$value])) ? $brix_final_product_obs[$value] : NULL,
                                'brix_final_product_without_added_sugar' => (!empty($brix_final_product_without_added_sugar_obs[$value])) ? $brix_final_product_without_added_sugar_obs[$value] : NULL,
                                'brix_fruit_greater_proportion_drink' => (!empty($brix_fruit_greater_proportion_drink_obs[$value])) ? $brix_fruit_greater_proportion_drink_obs[$value] : NULL,
                                'names_colourings' => (!empty($names_colourings_obs[$value])) ? $names_colourings_obs[$value] : NULL,
                                'minimum_porcent_cocoa_solids' => (!empty($minimum_porcent_cocoa_solids_obs[$value])) ? $minimum_porcent_cocoa_solids_obs[$value] : NULL,
                                'porcent_cocoa_butter_cocoa_mass' => (!empty($porcent_cocoa_butter_cocoa_mass_obs[$value])) ? $porcent_cocoa_butter_cocoa_mass_obs[$value] : NULL,
                                'contain_potential_allergens' => (!empty($contain_potential_allergens_obs[$value])) ? $contain_potential_allergens_obs[$value] : NULL,
                                'cereals_gluten' => (!empty($cereals_gluten_obs[$value])) ? $cereals_gluten_obs[$value] : NULL,
                                'crustacean_products' => (!empty($crustacean_products_obs[$value])) ? $crustacean_products_obs[$value] : NULL,
                                'egg_derivatives' => (!empty($egg_derivatives_obs[$value])) ? $egg_derivatives_obs[$value] : NULL,
                                'fish_derivatives' => (!empty($fish_derivatives_obs[$value])) ? $fish_derivatives_obs[$value] : NULL,
                                'peanuts_soy_derivatives' => (!empty($peanuts_soy_derivatives_obs[$value])) ? $peanuts_soy_derivatives_obs[$value] : NULL,
                                'milk_dairy_derivatives' => (!empty($milk_dairy_derivatives_obs[$value])) ? $milk_dairy_derivatives_obs[$value] : NULL,
                                'nuts_derivatives' => (!empty($nuts_derivatives_obs[$value])) ? $nuts_derivatives_obs[$value] : NULL,
                                'sulfites_derivatives' => (!empty($sulfites_derivatives_obs[$value])) ? $sulfites_derivatives_obs[$value] : NULL,
                                'total_plate_count' => (!empty($total_plate_count_obs[$value])) ? $total_plate_count_obs[$value] : NULL,
                                'staphylococcus' => (!empty($staphylococcus_obs[$value])) ? $staphylococcus_obs[$value] : NULL,
                                'mold' => (!empty($mold_obs[$value])) ? $mold_obs[$value] : NULL,
                                'coliform' => (!empty($coliform_obs[$value])) ? $coliform_obs[$value] : NULL,
                                'clostridium_perfringens' => (!empty($clostridium_perfringens_obs[$value])) ? $clostridium_perfringens_obs[$value] : NULL,
                                'yeast' => (!empty($yeast_obs[$value])) ? $yeast_obs[$value] : NULL,
                                'e_coli' => (!empty($e_coli_obs[$value])) ? $e_coli_obs[$value] : NULL,
                                'listeria_monocytogenes' => (!empty($listeria_monocytogenes_obs[$value])) ? $listeria_monocytogenes_obs[$value] : NULL,
                                'e_coli_0157_h7' => (!empty($e_coli_0157_h7_obs[$value])) ? $e_coli_0157_h7_obs[$value] : NULL,
                                'lactobacillus' => (!empty($lactobacillus_obs[$value])) ? $lactobacillus_obs[$value] : NULL,
                                'campylobacter' => (!empty($campylobacter_obs[$value])) ? $campylobacter_obs[$value] : NULL,
                                'enterobacteria' => (!empty($enterobacteria_obs[$value])) ? $enterobacteria_obs[$value] : NULL,
                                'thermophilic_commercial_sterility' => (!empty($thermophilic_commercial_sterility_obs[$value])) ? $thermophilic_commercial_sterility_obs[$value] : NULL,
                                'bacillus_cereus' => (!empty($bacillus_cereus_obs[$value])) ? $bacillus_cereus_obs[$value] : NULL,
                                'ph' => (!empty($ph_obs[$value])) ? $ph_obs[$value] : NULL,
                                'porcent_aw' => (!empty($porcent_aw_obs[$value])) ? $porcent_aw_obs[$value] : NULL,
                                'type_primary_packaging' => (!empty($type_primary_packaging_obs[$value])) ? $type_primary_packaging_obs[$value] : NULL,
                                'type_secundary_packaging' => (!empty($type_secundary_packaging_obs[$value])) ? $type_secundary_packaging_obs[$value] : NULL,
                                'type_controls_sealing_air_tightness_primary_packaging' => (!empty($type_controls_sealing_air_tightness_primary_packaging_obs[$value])) ? $type_controls_sealing_air_tightness_primary_packaging_obs[$value] : NULL,
                                'product_type' => (!empty($product_type_obs[$value])) ? $product_type_obs[$value] : NULL,
                                'serving_size' => (!empty($serving_size_obs[$value])) ? $serving_size_obs[$value] : NULL,
                                'servings_per_container' => (!empty($servings_per_container_obs[$value])) ? $servings_per_container_obs[$value] : NULL,
                                'energy' => (!empty($energy_obs[$value])) ? $energy_obs[$value] : NULL,
                                'proteins' => (!empty($proteins_obs[$value])) ? $proteins_obs[$value] : NULL,
                                'total_fat' => (!empty($total_fat_obs[$value])) ? $total_fat_obs[$value] : NULL,
                                'satured_fat' => (!empty($satured_fat_obs[$value])) ? $satured_fat_obs[$value] : NULL,
                                'trans_fat' => (!empty($trans_fat_obs[$value])) ? $trans_fat_obs[$value] : NULL,
                                'monosatured_fat' => (!empty($monosatured_fat_obs[$value])) ? $monosatured_fat_obs[$value] : NULL,
                                'polyunsatured_fat' => (!empty($polyunsatured_fat_obs[$value])) ? $polyunsatured_fat_obs[$value] : NULL,
                                'cholesterol' => (!empty($cholesterol_obs[$value])) ? $cholesterol_obs[$value] : NULL,
                                'total_carbohydrate' => (!empty($total_carbohydrate_obs[$value])) ? $total_carbohydrate_obs[$value] : NULL,
                                'available_carbohydrates' => (!empty($available_carbohydrates_obs[$value])) ? $available_carbohydrates_obs[$value] : NULL,
                                'total_sugars' => (!empty($total_sugars_obs[$value])) ? $total_sugars_obs[$value] : NULL,
                                'sucrose' => (!empty($sucrose_obs[$value])) ? $sucrose_obs[$value] : NULL,
                                'lactos' => (!empty($lactos_obs[$value])) ? $lactos_obs[$value] : NULL,
                                'poliols' => (!empty($poliols_obs[$value])) ? $poliols_obs[$value] : NULL,
                                'total_dietary_fiber' => (!empty($total_dietary_fiber_obs[$value])) ? $total_dietary_fiber_obs[$value] : NULL,
                                'soluble_fiber' => (!empty($soluble_fiber_obs[$value])) ? $soluble_fiber_obs[$value] : NULL,
                                'insoluble_fiber' => (!empty($insoluble_fiber_obs[$value])) ? $insoluble_fiber_obs[$value] : NULL,
                                'sodium' => (!empty($sodium_obs[$value])) ? $sodium_obs[$value] : NULL,
                                'vitamin_a' => (!empty($vitamin_a_obs[$value])) ? $vitamin_a_obs[$value] : NULL,
                                'vitamin_c' => (!empty($vitamin_c_obs[$value])) ? $vitamin_c_obs[$value] : NULL,
                                'vitamin_d' => (!empty($vitamin_d_obs[$value])) ? $vitamin_d_obs[$value] : NULL,
                                'vitamin_e' => (!empty($vitamin_e_obs[$value])) ? $vitamin_e_obs[$value] : NULL,
                                'vitamin_b1' => (!empty($vitamin_b1_obs[$value])) ? $vitamin_b1_obs[$value] : NULL,
                                'vitamin_b2' => (!empty($vitamin_b2_obs[$value])) ? $vitamin_b2_obs[$value] : NULL,
                                'niacin' => (!empty($niacin_obs[$value])) ? $niacin_obs[$value] : NULL,
                                'vitamin_b6' => (!empty($vitamin_b6_obs[$value])) ? $vitamin_b6_obs[$value] : NULL,
                                'folic_acid' => (!empty($folic_acid_obs[$value])) ? $folic_acid_obs[$value] : NULL,
                                'vitamin_b12' => (!empty($vitamin_b12_obs[$value])) ? $vitamin_b12_obs[$value] : NULL,
                                'pantothenic_acid' => (!empty($pantothenic_acid_obs[$value])) ? $pantothenic_acid_obs[$value] : NULL,
                                'biotin' => (!empty($biotin_obs[$value])) ? $biotin_obs[$value] : NULL,
                                'choline' => (!empty($choline_obs[$value])) ? $choline_obs[$value] : NULL,
                                'vitamin_k' => (!empty($vitamin_k_obs[$value])) ? $vitamin_k_obs[$value] : NULL,
                                'betacarotene' => (!empty($betacarotene_obs[$value])) ? $betacarotene_obs[$value] : NULL,
                                'calcium' => (!empty($calcium_obs[$value])) ? $calcium_obs[$value] : NULL,
                                'chromium' => (!empty($chromium_obs[$value])) ? $chromium_obs[$value] : NULL,
                                'copper' => (!empty($copper_obs[$value])) ? $copper_obs[$value] : NULL,
                                'yodo' => (!empty($yodo_obs[$value])) ? $yodo_obs[$value] : NULL,
                                'iron' => (!empty($iron_obs[$value])) ? $iron_obs[$value] : NULL,
                                'magnesium' => (!empty($magnesium_obs[$value])) ? $magnesium_obs[$value] : NULL,
                                'manganese' => (!empty($manganese_obs[$value])) ? $manganese_obs[$value] : NULL,
                                'molybdenum' => (!empty($molybdenum_obs[$value])) ? $molybdenum_obs[$value] : NULL,
                                'phosphorus' => (!empty($phosphorus_obs[$value])) ? $phosphorus_obs[$value] : NULL,
                                'zinc' => (!empty($zinc_obs[$value])) ? $zinc_obs[$value] : NULL,
                                'selenium' => (!empty($selenium_obs[$value])) ? $selenium_obs[$value] : NULL,
                                #'haccp' => (!empty($haccp_obs[$value])) ? $haccp_obs[$value] : NULL,
                                #'others_certifications' => (!empty($others_certifications_obs[$value])) ? $others_certifications_obs[$value] : NULL,
                                'total_aflatoxins' => (!empty($total_aflatoxins_obs[$value])) ? $total_aflatoxins_obs[$value] : NULL,
                                'aflatoxina_m1' => (!empty($aflatoxina_m1_obs[$value])) ? $aflatoxina_m1_obs[$value] : NULL,
                                'zearalenone' => (!empty($zearalenone_obs[$value])) ? $zearalenone_obs[$value] : NULL,
                                'patulin' => (!empty($patulin_obs[$value])) ? $patulin_obs[$value] : NULL,
                                'ochratoxin' => (!empty($ochratoxin_obs[$value])) ? $ochratoxin_obs[$value] : NULL,
                                'deoxynivalenol' => (!empty($deoxynivalenol_obs[$value])) ? $deoxynivalenol_obs[$value] : NULL,
                                'fumonisinas' => (!empty($fumonisinas_obs[$value])) ? $fumonisinas_obs[$value] : NULL,
                                'zn' => (!empty($zn_obs[$value])) ? $zn_obs[$value] : NULL,
                                'pb' => (!empty($pb_obs[$value])) ? $pb_obs[$value] : NULL,
                                'cd' => (!empty($cd_obs[$value])) ? $cd_obs[$value] : NULL,
                                'hg' => (!empty($hg_obs[$value])) ? $hg_obs[$value] : NULL,
                                'sn' => (!empty($sn_obs[$value])) ? $sn_obs[$value] : NULL,
                                'cu' => (!empty($cu_obs[$value])) ? $cu_obs[$value] : NULL,
                                'ars' => (!empty($ars_obs[$value])) ? $ars_obs[$value] : NULL,
                                'se' => (!empty($se_obs[$value])) ? $se_obs[$value] : NULL,
                                'chloramphenicol' => (!empty($chloramphenicol_obs[$value])) ? $chloramphenicol_obs[$value] : NULL,
                                'tetracycline' => (!empty($tetracycline_obs[$value])) ? $tetracycline_obs[$value] : NULL,
                                'quinolones' => (!empty($quinolones_obs[$value])) ? $quinolones_obs[$value] : NULL,
                                'sulfonamides' => (!empty($sulfonamides_obs[$value])) ? $sulfonamides_obs[$value] : NULL,
                                'pesticides' => (!empty($pesticides_obs[$value])) ? $pesticides_obs[$value] : NULL,
                                'dioxin_furan' => (!empty($dioxin_furan_obs[$value])) ? $dioxin_furan_obs[$value] : NULL,
                                'steroids' => (!empty($steroids_obs[$value])) ? $steroids_obs[$value] : NULL,
                                #'gluten_free' => (!empty($gluten_free_obs[$value])) ? $gluten_free_obs[$value] : NULL,
                                #'hidroxianthracene' => (!empty($hidroxianthracene_obs[$value])) ? $hidroxianthracene_obs[$value] : NULL,
                                #'aloine' => (!empty($aloine_obs[$value])) ? $aloine_obs[$value] : NULL,
                            ]);
                           
                            activity()
                            ->performedOn($producto)
                            ->causedBy(Auth::user())
                            ->withProperties(['old_data' => $obs_old_data_prod, 'new_data' => $obs_producto])
                            ->log('Prospecto Solicitud editado OBS');

                            //////////ARCHIVOS////////////
                                
                                ##health_certificate
                                if(!empty($health_certificate_file[$value])){
                                    $health_certificate_q=BibliotecaDocumentos::create([
                                        'id_user' => Auth::user()->id,
                                        'id_solicitud_importado' => $id,
                                        'id_prospecto_importado' => $value,
                                        'id_proveedor' => $producto->id_proveedor,
                                        'id_documento' => 60,
                                    ]);
                                    if ($health_certificate_file[$value]->isValid()) {
                                        $health_certificate_q->addMedia($health_certificate_file[$value])->toMediaCollection('certificaciones_fijas_producto');
                                    }
                                }
                                /*
                                ##organic_certification
                                if(!empty($organic_certification_file[$value])){
                                    $organic_certification_q=BibliotecaDocumentos::create([
                                        'id_user' => Auth::user()->id,
                                        'id_solicitud_importado' => $id,
                                        'id_prospecto_importado' => $value,
                                        'id_proveedor' => $producto->id_proveedor,
                                        'id_documento' => 23,
                                    ]);
                                    if ($organic_certification_file[$value]->isValid()) {
                                        $organic_certification_q->addMedia($organic_certification_file[$value])->toMediaCollection('certificaciones_fijas_producto');
                                    }
                                }
                                ##certification_free_afp
                                if(!empty($certification_free_afp_file[$value])){
                                    $certification_free_afp_file_q=BibliotecaDocumentos::create([
                                        'id_user' => Auth::user()->id,
                                        'id_solicitud_importado' => $id,
                                        'id_prospecto_importado' => $value,
                                        'id_proveedor' => $producto->id_proveedor,
                                        'id_documento' => 61,
                                    ]);
                                    if ($certification_free_afp_file[$value]->isValid()) {
                                        $certification_free_afp_file_q->addMedia($certification_free_afp_file[$value])->toMediaCollection('certificaciones_fijas_producto');
                                    }
                                }
                                ##haccp
                                if(!empty($haccp_file[$value])){
                                    $haccp_q=BibliotecaDocumentos::create([
                                        'id_user' => Auth::user()->id,
                                        'id_solicitud_importado' => $id,
                                        'id_prospecto_importado' => $value,
                                        'id_proveedor' => $producto->id_proveedor,
                                        'id_documento' => 37,
                                    ]);
                                    if ($haccp_file[$value]->isValid()) {
                                        $haccp_q->addMedia($haccp_file[$value])->toMediaCollection('certificaciones_fijas_producto');
                                    }
                                }
                                ##others_certifications
                                if(!empty($others_certifications_file[$value])){
                                    $others_certifications_q=BibliotecaDocumentos::create([
                                        'id_user' => Auth::user()->id,
                                        'id_solicitud_importado' => $id,
                                        'id_prospecto_importado' => $value,
                                        'id_proveedor' => $producto->id_proveedor,
                                        'id_documento' => 22,
                                    ]);
                                    if ($others_certifications_file[$value]->isValid()) {
                                        $others_certifications_q->addMedia($others_certifications_file[$value])->toMediaCollection('certificaciones_fijas_producto');
                                    }
                                }
                                ##gluten_free
                                if(!empty($gluten_free_file[$value])){
                                    $gluten_free_q=BibliotecaDocumentos::create([
                                        'id_user' => Auth::user()->id,
                                        'id_solicitud_importado' => $id,
                                        'id_prospecto_importado' => $value,
                                        'id_proveedor' => $producto->id_proveedor,
                                        'id_documento' => 27,
                                    ]);
                                    if ($gluten_free_file[$value]->isValid()) {
                                        $gluten_free_q->addMedia($gluten_free_file[$value])->toMediaCollection('certificaciones_fijas_producto');
                                    }
                                }
                                ##hidroxianthracene
                                if(!empty($hidroxianthracene_file[$value])){
                                    $hidroxianthracene_q=BibliotecaDocumentos::create([
                                        'id_user' => Auth::user()->id,
                                        'id_solicitud_importado' => $id,
                                        'id_prospecto_importado' => $value,
                                        'id_proveedor' => $producto->id_proveedor,
                                        'id_documento' => 62,
                                    ]);
                                    if ($hidroxianthracene_file[$value]->isValid()) {
                                        $hidroxianthracene_q->addMedia($hidroxianthracene_file[$value])->toMediaCollection('certificaciones_fijas_producto');
                                    }
                                }
                                ##aloine
                                if(!empty($aloine_file[$value])){
                                    $aloine_q = BibliotecaDocumentos::create([
                                        'id_user' => Auth::user()->id,
                                        'id_solicitud_importado' => $id,
                                        'id_prospecto_importado' => $value,
                                        'id_proveedor' => $producto->id_proveedor,
                                        'id_documento' => 63,
                                    ]);
                                    if ($aloine_file[$value]->isValid()) {
                                        $aloine_q->addMedia($aloine_file[$value])->toMediaCollection('certificaciones_fijas_producto');
                                    }
                                }*/
                                ##flow_chart
                                if(!empty($flow_chart_file[$value])){
                                    $flow_chart_q = BibliotecaDocumentos::create([
                                        'id_user' => Auth::user()->id,
                                        'id_solicitud_importado' => $id,
                                        'id_prospecto_importado' => $value,
                                        'id_proveedor' => $producto->id_proveedor,
                                        'id_documento' => 64,
                                    ]);
                                    if ($flow_chart_file[$value]->isValid()) {
                                        $flow_chart_q->addMedia($flow_chart_file[$value])->toMediaCollection('certificaciones_fijas_producto');
                                    }
                                }
                                ##label_design_file
                                if(!empty($label_design_file[$value])){
                                    $label_design_file_q = BibliotecaDocumentos::create([
                                        'id_user' => Auth::user()->id,
                                        'id_solicitud_importado' => $id,
                                        'id_prospecto_importado' => $value,
                                        'id_proveedor' => $producto->id_proveedor,
                                        'id_documento' => 65,
                                    ]);
                                    if ($label_design_file[$value]->isValid()) {
                                        $label_design_file_q->addMedia($label_design_file[$value])->toMediaCollection('certificaciones_fijas_producto');
                                    }
                                }
                        }

                        ///////////////////////////////////////
                        ######INSERT CERTIFICACIONES FIJAS######
                        foreach ($id_certificacion_fija[$value] as $k => $v) {
                            if(empty($id_exist_certificacion_fija[$value][$v]) && (!empty($nombre_laboratorio_f[$value][$v]) || !empty($numero_certificado_f[$value][$v]))){
                                $certificacion_fija = BibliotecaDocumentos::create([
                                    'id_user' => Auth::user()->id,
                                    'id_solicitud_importado' => $id,
                                    'id_prospecto_importado' => $value,
                                    'id_proveedor' => $producto->id_proveedor,
                                    'id_documento' => $v,
                                    'nombre_laboratorio' => $nombre_laboratorio_f[$value][$v],
                                    'numero_certificado' => $numero_certificado_f[$value][$v],
                                ]);
                            }
                            if(!empty($id_exist_certificacion_fija[$value][$v])){
                                $certificacion_fija = BibliotecaDocumentos::find($id_exist_certificacion_fija[$value][$v]);
                                $certificacion_fija->update([
                                    'nombre_laboratorio' => $nombre_laboratorio_f[$value][$v],
                                    'numero_certificado' => $numero_certificado_f[$value][$v],
                                ]);
                            }
                            if(!empty($adjunto_f[$value][$v])){
                                $adjunto_certificacion_f = $adjunto_f[$value][$v];
                                if ($adjunto_certificacion_f->isValid()) {
                                    $certificacion_fija->addMedia($adjunto_certificacion_f)->toMediaCollection('certificaciones_fijas_producto_importado');
                                }
                            }
                        }
                        /*if($estado_cl[$value] > 1){
                            $producto->update(['fecha_cierre' => date('Y-m-d')]);
                        }
                        if($estado_cl[$value] == 1){
                            $producto->update(['fecha_cierre' => NULL]);
                        }*/
                        #activity()
                        #->performedOn($producto)
                        #->causedBy(Auth::user())
                        #->withProperties(['old_data' => $old_data_prod, 'new_data' => $producto])
                        #->log('Prospecto Solicitud editado');
                        /*activity()
                        ->performedOn($producto)
                        ->causedBy(Auth::user())
                        ->withProperties(['old_data' => $obs_old_data_prod, 'new_data' => $obs_producto])
                        ->log('Prospecto Solicitud editado OBS');*/
                    }
                    
                }

                activity()
                ->performedOn($solicitud)
                ->causedBy(Auth::user())
                ->withProperties(['old_data' => $old_data, 'new_data' => $solicitud])
                ->log('Solicitud Prospecto editada');
                LogBatch::endBatch();
            });
            return redirect()->route('prospectos-importados.edit',$id)->with('notification_type', 'success')->with('notification_message', 'Prospecto guardado correctamente!')->with('stepp',$request->input('stepp')+1);
        } catch (\Exception $e) {
            // Manejar la excepción o responder con un mensaje de error
            return redirect()->route('prospectos-importados.edit',$id)->with('notification_type', 'danger')->with('notification_message', 'Error al guardar el Prospecto: ' . $e->getMessage());
            #return redirect()->route('orders.index')->with('error', 'Error al crear el pedido: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {}
    public function list_prospectos_proceso()
    {
        /** @var \App\Models\User */
        $user = Auth::user();
        if($user->hasRole('comercial')){            
            $data['mis_prospectos_sin_notificar'] = SolicitudProspectoProductosImportadosAca::with('productos_solicitud_prospecto','responsable_comercial','responsable_calidad')
                                                                    ->where('status',1)
                                                                    ->where('estado_solicitud', 0)
                                                                    ->where(function ($query) {
                                                                        $query->where('id_creador', Auth::user()->id)
                                                                              ->orWhere('id_comercial', Auth::user()->id);
                                                                    })->get();
        }
        $data['prospectos'] = SolicitudProspectoProductosImportadosAca::with('productos_solicitud_prospecto','responsable_comercial','responsable_calidad')
                                                                    ->where('status',1)
                                                                    ->where('estado_solicitud', '!=' ,0)
                                                                    ->where(function ($query) {
                                                                        $query->where('id_creador', '!=' ,Auth::user()->id)
                                                                                ->orWhere('id_comercial', '!=' ,Auth::user()->id)
                                                                                ->orWhere('id_calidad', '!=' ,Auth::user()->id);
                                                                    })->get();
        $data['mis_prospectos'] = SolicitudProspectoProductosImportadosAca::with('productos_solicitud_prospecto','responsable_comercial','responsable_calidad')
                                                                    ->where('status',1)
                                                                    ->where('estado_solicitud', '!=' ,0)
                                                                    ->where(function ($query) {
                                                                        $query->where('id_creador',Auth::user()->id)
                                                                                ->orWhere('id_comercial',Auth::user()->id)
                                                                                ->orWhere('id_calidad',Auth::user()->id);
                                                                    })->get();
        $data['sin_calidad_prospectos'] = SolicitudProspectoProductosImportadosAca::with('productos_solicitud_prospecto','responsable_comercial','responsable_calidad')
                                                                    ->where('status',1)
                                                                    ->where('estado_solicitud', '!=' ,0)
                                                                    ->Where('id_calidad',NULL)
                                                                    ->get();
        return view('prospectos-importados.list-proceso-prospectos', $data);
    }
    public function list_prospectos_cerrado()
    {
        $data['prospectos'] = SolicitudProspectoProductosImportadosAca::with('productos_solicitud_prospecto','responsable_comercial','responsable_calidad')
                                                                    ->where('status',2)
                                                                    ->where(function ($query) {
                                                                        $query->where('id_creador', '!=' ,Auth::user()->id)
                                                                                ->orWhere('id_comercial', '!=' ,Auth::user()->id)
                                                                                ->orWhere('id_calidad', '!=' ,Auth::user()->id);
                                                                    })->get();
        $data['mis_prospectos'] = SolicitudProspectoProductosImportadosAca::with('productos_solicitud_prospecto','responsable_comercial','responsable_calidad')
                                                                    ->where('status',2)
                                                                    ->where(function ($query) {
                                                                        $query->where('id_creador',Auth::user()->id)
                                                                                ->orWhere('id_comercial',Auth::user()->id)
                                                                                ->orWhere('id_calidad',Auth::user()->id);
                                                                    })->get();
        $data['sin_calidad_prospectos'] = SolicitudProspectoProductosImportadosAca::with('productos_solicitud_prospecto','responsable_comercial','responsable_calidad')
                                                                    ->where('status',2)
                                                                    ->orWhere('id_calidad',NULL)
                                                                    ->get();
        return view('prospectos-importados.list-cerrado-prospectos', $data);
    }
    public function prospecto_PDF($id)
    {}
    public function planilla_solicitud_prospecto_excel(string $id){
        /*$mes = (!empty($request->input('mes_excel'))) ? $request->input('mes_excel') : date('m');
        $ano = (!empty($request->input('ano_excel'))) ? $request->input('ano_excel') : date('Y');
        $seccion = $request->input('seccion_excel');
        $query = Reclamo::with('seccion','tienda')->where('reclamo_fecha','LIKE','%'.$ano.'-'.$mes.'%');
        if(!empty($seccion)){
            $query->where('id_seccion',$seccion);
        };
        $data['reporte_data'] = $query->get();*/
        $data['data'] = SolicitudProspectoProductosImportadosAca::with('productos_solicitud_prospecto.obs')->findOrFail($id);
        #$data['data']=[];
        return Excel::download(new PlanillaSolicitudImportadoExcel('default', $data), 'Planilla_Solicitud.xlsx');
    }
    public function ficha_tecnica_excel(string $id){
        /*$mes = (!empty($request->input('mes_excel'))) ? $request->input('mes_excel') : date('m');
        $ano = (!empty($request->input('ano_excel'))) ? $request->input('ano_excel') : date('Y');
        $seccion = $request->input('seccion_excel');
        $query = Reclamo::with('seccion','tienda')->where('reclamo_fecha','LIKE','%'.$ano.'-'.$mes.'%');
        if(!empty($seccion)){
            $query->where('id_seccion',$seccion);
        };
        $data['reporte_data'] = $query->get();*/
        $data['data'] = ProductosSolicitudImportadosAca::with('obs')->findOrFail($id);
        #$data['data']=[];
        return Excel::download(new FichaTecnicaImportadoExcel('default', $data), 'Ficha_Tecnica.xlsx');
    }
    public function formato_masivo_productos_excel(){
        $data['data']['secciones'] = Seccion::all();
        #$data['data']=[];
        return Excel::download(new FormatoCargaMasivaProductosImportadosExcel($data), 'Formato_carga_masiva.xlsx');
    }
    public function buscar_fichas_tecnicas(Request $request)
    {
        //
        $data=[];       
        $nombre_producto = (!empty($request->input('nombre_producto'))) ? $request->input('nombre_producto') : '%';
        $codigo_ean = (!empty($request->input('codigo_ean'))) ? $request->input('codigo_ean') : '%';
        $codigo_sap = (!empty($request->input('codigo_sap'))) ? $request->input('codigo_sap') : '%';
        $nombre_proveedor = (!empty($request->input('nombre_proveedor'))) ? $request->input('nombre_proveedor') : '%';
        $rut_proveedor = (!empty($request->input('rut_proveedor'))) ? $request->input('rut_proveedor') : '%';
        $data['request'] =$request;
        $data['fichas_tecnicas']=[];

        if($nombre_proveedor != '%' || $rut_proveedor != '%' || $nombre_producto != '%' || $codigo_ean != '%' || $codigo_sap != '%'){
            /*SolicitudProspectoProductosImportadosAca::with('productos_solicitud_prospecto')
            ->whereHas('productos_solicitud_prospecto', function ($query) use ($nombre_producto) {
                $query->where('nombre_producto', $nombre_producto);
            })
            ->where('nombre_proveedor', $nombre_proveedor)
            ->get();*/
            $fichas_query = SolicitudProspectoProductosImportadosAca::with('productos_solicitud_prospecto');
            if($nombre_proveedor != '%'){
                $fichas_query->where('nombre_proveedor','LIKE',"%$nombre_proveedor%");
            }
            if($rut_proveedor != '%' ){
                $fichas_query->where('rut_proveedor','LIKE',"%$rut_proveedor%");
            }
            if($nombre_producto != '%'){
                $fichas_query->whereHas('productos_solicitud_prospecto', function ($query) use ($nombre_producto) {
                    if($nombre_producto != '%'){
                        $query->where('product_name', 'LIKE', "%$nombre_producto%");
                    }
                    /*if($codigo_ean != '%'){
                        $query->where('upc_bar_code', 'LIKE', "%$codigo_ean%");
                    }
                    if($codigo_sap != '%'){
                        $query->where('sap', 'LIKE', "%$codigo_sap%");
                    }*/
                });               
            }
            $data['fichas_tecnicas'] = $fichas_query->get();
        }
        
        return view('prospectos-importados.list-fichas-tecnicas',$data);
    }
}
