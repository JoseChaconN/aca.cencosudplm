<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Seccion;
use App\Models\Pais;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\SolicitudProspectoProductosAca;
use App\Models\ProductosSolicitudProspectosAca;
use App\Models\ContactosProveedor;
use App\Models\PlantasProveedor;
use App\Models\ListadoDocumentos;
use App\Models\BibliotecaDocumentos;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Facades\Auth;

use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

class ProspectosAcaController extends Controller
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
        return view('prospectos-aca.nuevo-prospecto', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_proveedor' => 'required',
        ]);
        $nuevaSolicitudId = null;
        try {
            DB::transaction(function () use ($request, &$nuevaSolicitudId) {
                // Crear el pedido (tabla padre)
                $proveedor = Proveedor::find($request->input('id_proveedor'));
                $solicitud = SolicitudProspectoProductosAca::create([
                    'n_solicitud' => time().mt_rand(0, 99999),
                    'id_creador' => Auth::user()->id,
                    'id_comercial' => Auth::user()->id,
                    'status' => 1,
                    'id_proveedor' => $request->input('id_proveedor'),
                    'nombre_proveedor' => $proveedor->nombre,
                    'rut_proveedor' => $proveedor->rut,
                ]);

                #INSERT DE CONTACTOS
                $nombre_contacto_comercial_array=(!empty($request->input('nombre_contacto_comercial'))) ? $request->input('nombre_contacto_comercial') : [];
                $email_contacto_comercial_array=$request->input('email_contacto_comercial');
                $telefono_contacto_comercial_array=$request->input('telefono_contacto_comercial');
                foreach ($nombre_contacto_comercial_array as $key => $value) {
                    if(!empty($value)){
                       /* ContactosProveedor::create([
                            'id_proveedor' => $request->input('id_proveedor'),
                            'nombre' => $value,
                            'email' => $email_contacto_comercial_array[$key],
                            'telefono' => $telefono_contacto_comercial_array[$key],
                            'tipo' => 1,
                        ]);*/
                    }
                }
                $nombre_contacto_calidad_array=(!empty($request->input('nombre_contacto_calidad'))) ? $request->input('nombre_contacto_calidad') : [];
                $email_contacto_calidad_array=$request->input('email_contacto_calidad');
                $telefono_contacto_calidad_array=$request->input('telefono_contacto_calidad');
                foreach ($nombre_contacto_calidad_array as $key => $value) {
                    if(!empty($value)){
                       /* ContactosProveedor::create([
                            'id_proveedor' => $request->input('id_proveedor'),
                            'nombre' => $value,
                            'email' => $email_contacto_calidad_array[$key],
                            'telefono' => $telefono_contacto_calidad_array[$key],
                            'tipo' => 2,
                        ]);*/
                    }
                }
                $nombre_planta_array=(!empty($request->input('nombre_planta'))) ? $request->input('nombre_planta') : [];
                $direccion_planta_array=$request->input('direccion_planta');
                $documento_planta_array=$request->file('documento_planta');
                
                foreach ($nombre_planta_array as $key => $value) {
                    if(!empty($value)){
                       /* $planta_proveedor=PlantasProveedor::create([
                            'id_proveedor' => $request->input('id_proveedor'),
                            'nombre' => $value,
                            'direccion' => $direccion_planta_array[$key],
                        ]);
                        if(!empty($documento_planta_array[$key])){
                            $doc = $documento_planta_array[$key];
                            if ($doc->isValid()) {
                                // Guarda la imagen en la librería de medios del producto
                                $planta_proveedor->addMedia($doc)->toMediaCollection('resolucion_sanitaria_planta');
                            }
                        }*/
                    }
                }
                #INSERT DE PRODUCTOS
                
                // Crear ítems de pedido (tabla hijo)
                $seccion_producto_array = $request->input('seccion_producto');
                $marca_producto_array = $request->input('marca_producto');
                $codigo_barra_producto_array = $request->input('codigo_barra_producto');
                foreach ($request->input('nombre_producto') as $key => $productoData) {
                    // Asociar el ítem de pedido con el pedido
                    $seccion = Seccion::find($seccion_producto_array[$key]);
                    $producto_prospecto=ProductosSolicitudProspectosAca::create([
                        'id_solicitud' => $solicitud->id,
                        'id_proveedor' => $request->input('id_proveedor'),
                        'nombre_producto' => $productoData,
                        'id_seccion' => $seccion_producto_array[$key],
                        'seccion' => $seccion->nombre,
                        'marca' => $marca_producto_array[$key],
                        'codigo_barra' => $codigo_barra_producto_array[$key],
                    ]);
                }
                $nuevaSolicitudId = $solicitud->id;
            });
            return redirect()->route('prospectos.edit',$nuevaSolicitudId)->with('notification_type', 'success')->with('notification_message', 'Solicitud creada con exito!');
        } catch (\Exception $e) {
            // Manejar la excepción o responder con un mensaje de error
            return redirect()->route('prospectos.create')->with('notification_type', 'danger')->with('notification_message', 'Error al crear el prospecto: ' . $e->getMessage());
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
        $data=[];
        $data['secciones'] = Seccion::where('status' , '=' , 1)->orderBy('nombre')->get();
        $data['marcas'] = Producto::select('marca')->where('status' , '=' , 1)->orderBy('marca')->groupBy('marca')->get();
        $data['prospecto'] = SolicitudProspectoProductosAca::with('productos_solicitud_prospecto')->findOrFail($id);
        $data['contactos_comercial'] = ContactosProveedor::where('id_proveedor', $data['prospecto']->id_proveedor)->where('tipo', '1')->get();
        $data['contactos_calidad'] = ContactosProveedor::where('id_proveedor', $data['prospecto']->id_proveedor)->where('tipo', '2')->get();
        $data['plantas'] = PlantasProveedor::where('id_proveedor', $data['prospecto']->id_proveedor)->get();
        $data['paises'] = Pais::orderBy('nombre')->get();
        $data['certificaciones_vencimiento'] = ListadoDocumentos::where('mostrar_prospecto', 1)->where('tipo_documento', 1)->get();
        $data['certificaciones_fijas'] = ListadoDocumentos::where('mostrar_prospecto', 1)->where('tipo_documento', 2)->get();
        $data['documentos_solicitados_proveedor'] = ListadoDocumentos::where('mostrar_prospecto', 1)->where('tipo_documento', 3)->get();
        
        #BUSCAR COMO MEJORAR
        /* foreach ($data['prospecto']->productos_solicitud_prospecto as $producto) {
            $certificacion_exist = BibliotecaDocumentos::where('id_producto',$producto->id)->groupBy('id_certificacion')->latest('created_at')->get();
            if(!empty($certificacion_exist)){
                foreach ($certificacion_exist as $certificacion) {
                    $data['certificaciones_fijas_producto'][$producto->id][$certificacion->id_certificacion] = $certificacion;
                }
            }
        } */
        foreach ($data['prospecto']->productos_solicitud_prospecto as $producto) {
            $producto_q = ProductosSolicitudProspectosAca::find($producto->id);
            $imagenes_productos = $producto_q->getMedia('imagenes_producto');
            foreach ($imagenes_productos as $imagen) {
                $data['imagenes_productos'][$producto->id][] = ['id' => $imagen->id , 'url' => $imagen->getUrl()];
            }
            $imagen_nutricional_producto = $producto_q->getMedia('imagenes_nutricional_producto')->last();
            if(!empty($imagen_nutricional_producto)){
                $data['imagen_nutricional_productos'][$producto->id] = ['id' => $imagen_nutricional_producto->id , 'url' => $imagen_nutricional_producto->getUrl()];
            }
            $logo_producto_producto = $producto_q->getMedia('logo_producto')->last();
            if(!empty($logo_producto_producto)){
                $data['logo_producto'][$producto->id] = ['id' => $logo_producto_producto->id , 'url' => $logo_producto_producto->getUrl()];
            }
            $logo_oficial_sag = $producto_q->getMedia('logo_oficial_sag_producto')->last();
            if(!empty($logo_oficial_sag)){
                $data['logo_oficial_sag'][$producto->id] = ['id' => $logo_oficial_sag->id , 'url' => $logo_oficial_sag->getUrl()];
            }
            foreach ($data['certificaciones_fijas'] as $certificacion) {
                $certificacion_exist = BibliotecaDocumentos::where('id_prospecto',$producto->id)->where('id_documento',$certificacion->id)->latest()->first();
                if(!empty($certificacion_exist->id_documento)){
                    $data['certificaciones_fijas_producto'][$producto->id][$certificacion_exist->id_documento] = $certificacion_exist;
                    $adjunto_certificacion_fija = $certificacion_exist->getMedia('certificaciones_fijas_producto')->last();
                    if(!empty($adjunto_certificacion_fija->id)){
                        $data['adjunto_certificaciones_fijas_producto'][$producto->id][$certificacion_exist->id_documento] = ['id' => $adjunto_certificacion_fija->id , 'url' => $adjunto_certificacion_fija->getUrl()];
                    }
                }
            }
            foreach ($data['certificaciones_vencimiento'] as $certificacion) {
                $certificacion_exist = BibliotecaDocumentos::where('id_prospecto',$producto->id)->where('id_documento',$certificacion->id)->latest()->first();
                if(!empty($certificacion_exist->id_documento)){
                    $data['certificaciones_vencimiento_producto'][$producto->id][$certificacion_exist->id] = $certificacion_exist;
                    $adjunto_certificacion_vencimiento = $certificacion_exist->getMedia('certificaciones_vencimiento_producto')->last();
                    if(!empty($adjunto_certificacion_vencimiento->id)){
                        $data['adjunto_certificaciones_vencimiento_producto'][$producto->id][$certificacion_exist->id] = ['id' => $adjunto_certificacion_vencimiento->id , 'url' => $adjunto_certificacion_vencimiento->getUrl()];
                    }
                }
            }
            foreach ($data['documentos_solicitados_proveedor'] as $documento) {
                $documentos_solicitados_proveedor_exist = BibliotecaDocumentos::where('id_prospecto',$producto->id)->where('id_documento',$documento->id)->latest()->first();
                if(!empty($documentos_solicitados_proveedor_exist->id_documento)){
                    $data['documentos_solicitados_proveedor_exist'][$producto->id][$documentos_solicitados_proveedor_exist->id_documento] = $documentos_solicitados_proveedor_exist;
                    $adjunto_documento = $documentos_solicitados_proveedor_exist->getMedia('documentos_solicitados_proveedor')->last();
                    if(!empty($adjunto_documento->id)){
                        $data['adjunto_documentos_solicitados_proveedor_exist'][$producto->id][$documentos_solicitados_proveedor_exist->id_documento] = ['id' => $adjunto_documento->id , 'url' => $adjunto_documento->getUrl(),'documento_id' => $documentos_solicitados_proveedor_exist->id];
                    }
                }
            }
        }
        return view('prospectos-aca.edit-prospecto', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            
            DB::transaction(function () use ($request, &$id) {
                /** @var \App\Models\User */
                $user = Auth::user();
                $solicitud = SolicitudProspectoProductosAca::find($id);
                $old_data = $solicitud->getOriginal();
                $estado_cl = $request->input('estado_cl');
               
                /* #INSERT DE CONTACTOS
                $nombre_contacto_comercial_array=(!empty($request->input('nombre_contacto_comercial'))) ? $request->input('nombre_contacto_comercial') : [];
                $email_contacto_comercial_array=$request->input('email_contacto_comercial');
                $telefono_contacto_comercial_array=$request->input('telefono_contacto_comercial');                
                foreach ($nombre_contacto_comercial_array as $key => $value) {
                    if(!empty($value)){
                        ContactosProveedor::create([
                            'id_proveedor' => $solicitud->id_proveedor,
                            'nombre' => $value,
                            'email' => $email_contacto_comercial_array[$key],
                            'telefono' => $telefono_contacto_comercial_array[$key],
                            'tipo' => 1,
                        ]);
                    }
                }
                $nombre_contacto_calidad_array=(!empty($request->input('nombre_contacto_calidad'))) ? $request->input('nombre_contacto_calidad') : [];
                $email_contacto_calidad_array=$request->input('email_contacto_calidad');
                $telefono_contacto_calidad_array=$request->input('telefono_contacto_calidad');
                foreach ($nombre_contacto_calidad_array as $key => $value) {
                    if(!empty($value)){
                        ContactosProveedor::create([
                            'id_proveedor' => $solicitud->id_proveedor,
                            'nombre' => $value,
                            'email' => $email_contacto_calidad_array[$key],
                            'telefono' => $telefono_contacto_calidad_array[$key],
                            'tipo' => 2,
                        ]);
                    }
                }
                $nombre_planta_array=(!empty($request->input('nombre_planta'))) ? $request->input('nombre_planta') : [];
                $direccion_planta_array=$request->input('direccion_planta');
                $documento_planta_array=$request->file('documento_planta');
                
                foreach ($nombre_planta_array as $key => $value) {
                    if(!empty($value)){
                        $planta_proveedor=PlantasProveedor::create([
                            'id_proveedor' => $solicitud->id_proveedor,
                            'nombre' => $value,
                            'direccion' => $direccion_planta_array[$key],
                        ]);
                        if(!empty($documento_planta_array[$key])){
                            $doc = $documento_planta_array[$key];
                            if ($doc->isValid()) {
                                // Guarda la imagen en la librería de medios del producto
                                $planta_proveedor->addMedia($doc)->toMediaCollection('resolucion_sanitaria_planta');
                            }
                        }
                    }
                } */


                $solicitud->update([
                    'estado_solicitud' => $request->input('estado_solicitud'),
                    'id_calidad' => $request->input('id_calidad'),
                    'id_comercial' => $request->input('id_comercial'),
                ]);
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
                $nombre_producto=$request->input('nombre_producto');
                $marca_producto=$request->input('marca_producto');
                $codigo_barra_producto=$request->input('codigo_barra_producto');
                $vida_util_producto=$request->input('vida_util_producto');
                $tiempo_vida_util_producto=$request->input('tiempo_vida_util_producto');
                $imagen_producto = $request->file('imagen_producto');


                ################VARIABLES DOCUMENTOS SOLICITADOS PROVEEDOR####################
                $id_documento_solicitado_proveedor = $request->input('id_documento_solicitado_proveedor');
                $id_exist_documento_solicitado_proveedor = $request->input('id_exist_documento_solicitado_proveedor');
                $adjunto_documento_solicitado_proveedor = $request->file('documento_solicitado_proveedor');

               
                $observacion_solicitud = $request->input('observacion_solicitud');
                if($user->hasRole('comercial')){
                    foreach ($id_producto as $key => $value) {
                        $producto=ProductosSolicitudProspectosAca::find($value);
                        $producto->update([
                            'nombre_producto' => $nombre_producto[$value],
                            'codigo_barra' => $codigo_barra_producto[$value],
                            'marca' => $marca_producto[$value],
                            'vida_util_producto' => $vida_util_producto[$value],
                            'tiempo_vida_util_producto' => $tiempo_vida_util_producto[$value],
                        ]);
                        if (!empty($imagen_producto[$value])) {
                            foreach ($imagen_producto[$value] as $imagen) {
                                if ($imagen->isValid()) {
                                    // Guarda la imagen en la librería de medios del producto
                                    $producto->addMedia($imagen)->toMediaCollection('imagenes_producto');
                                }
                            }
                        }
                        ######DOCUMENTOS SOLICITADOS AL PROVEEDOR#####                        
                        foreach ($id_documento_solicitado_proveedor[$value] as $k => $v) {
                            if(empty($id_exist_documento_solicitado_proveedor[$value][$v]) && !empty($adjunto_documento_solicitado_proveedor[$value][$v])){
                                $documento_solicitado_proveedor_q = BibliotecaDocumentos::create([
                                    'id_solicitud' => $id,
                                    'id_user' => Auth::user()->id,
                                    'id_prospecto' => $value,
                                    'id_proveedor' => $producto->id_proveedor,
                                    'id_documento' => $v,
                                ]);
                            }else{
                                $documento_solicitado_proveedor_q = BibliotecaDocumentos::find($id_exist_documento_solicitado_proveedor[$value][$v]);
                            }
                            if(!empty($adjunto_documento_solicitado_proveedor[$value][$v])){
                                $adjunto = $adjunto_documento_solicitado_proveedor[$value][$v];
                                if ($adjunto->isValid()) {
                                    $documento_solicitado_proveedor_q->addMedia($adjunto)->toMediaCollection('documentos_solicitados_proveedor');
                                }
                            }
                        }
                    }
                }
                if($user->hasRole('calidad')){
                    $codigo_barra_producto_obs = $request->input('codigo_barra_producto_obs');
                    $nombre_producto_obs = $request->input('nombre_producto_obs');
                    $nombre_fabricante = $request->input('nombre_fabricante');
                    $nombre_fabricante_obs = $request->input('nombre_fabricante_obs');
                    $nombre_domicilio_importador = $request->input('nombre_domicilio_importador');
                    $nombre_domicilio_importador_obs = $request->input('nombre_domicilio_importador_obs');
                    $domicilio_prov = $request->input('domicilio_prov');
                    $domicilio_prov_obs = $request->input('domicilio_prov_obs');
                    $fecha_elab_envase = $request->input('fecha_elab_envase');
                    $fecha_elab_envase_obs = $request->input('fecha_elab_envase_obs');
                    $fecha_venc_dura = $request->input('fecha_venc_dura');
                    $fecha_venc_dura_obs = $request->input('fecha_venc_dura_obs');
                    $res_sanitaria = $request->input('res_sanitaria');
                    $res_sanitaria_obs = $request->input('res_sanitaria_obs');
                    $cont_neto = $request->input('cont_neto');
                    $cont_neto_obs = $request->input('cont_neto_obs');
                    $cont_drenado_escurrido = $request->input('cont_drenado_escurrido');
                    $cont_drenado_escurrido_obs = $request->input('cont_drenado_escurrido_obs');
                    $pais_origen = $request->input('pais_origen');
                    $pais_origen_obs = $request->input('pais_origen_obs');
                    $indica_uso = $request->input('indica_uso');
                    $indica_uso_obs = $request->input('indica_uso_obs');
                    $instru_almacena = $request->input('instru_almacena');
                    $instru_almacena_obs = $request->input('instru_almacena_obs');
                    $ingredientes = $request->input('ingredientes');
                    $ingredientes_obs = $request->input('ingredientes_obs');
                    $alto_calorias = $request->input('alto_calorias');
                    $alto_grasas_saturadas = $request->input('alto_grasas_saturadas');
                    $alto_azucares = $request->input('alto_azucares');
                    $alto_sodio = $request->input('alto_sodio');
                    $disco_obs = $request->input('disco_obs');
                    $razon_social_logo = $request->input('razon_social_logo_producto');
                    $especie_logo = $request->input('especie_logo_producto');
                    $variedad_logo = $request->input('variedad_logo_producto');
                    $organico_logo = $request->input('organico_logo_producto');
                    $tipo_organico_logo = $request->input('tipo_organico_logo_producto');                    
                    $certificado_por_logo = $request->input('certificado_por_logo_producto');
                    $entrega_muestra_producto = $request->input('entrega_muestra_producto');
                    $id_certificacion_fija = $request->input('id_certificacion_fija');
                    $id_exist_certificacion_fija = $request->input('id_exist_certificacion_fija');
                    $nombre_laboratorio_f = $request->input('nombre_laboratorio_f');
                    $numero_certificado_f = $request->input('numero_certificado_f');
                    $fecha_analisis_f = $request->input('fecha_analisis_f');
                    $duracion_validez_f = $request->input('duracion_validez_f');
                    $fecha_vencimiento_f = $request->input('fecha_vencimiento_f');
                    
                    $adjunto_f = $request->file('adjunto_f');

                    
                    $imagen_nutricional_producto = $request->file('imagen_nutricional_producto');
                    $logo_producto = $request->file('logo_producto');
                    $logo_oficial_sag_producto = $request->file('logo_oficial_sag_producto');

                    $id_exist_certificacion_vencimiento=$request->input('id_exist_certificacion_vencimiento');
                    $certificacion_vencimiento_array=$request->input('certificacion_vencimiento');
                    $fecha_emision_v_array=$request->input('fecha_emision_v');
                    $fecha_vencimiento_v_array=$request->input('fecha_vencimiento_v');
                    $adjunto_v_array=$request->file('adjunto_v');

                    foreach ($id_producto as $key => $value) {
                        $producto=ProductosSolicitudProspectosAca::find($value);
                        #$solicitud = SolicitudProspectoProductosAca::find($id);
                        $old_data_prod = $producto->getOriginal();
                        $producto->update([
                            'nombre_producto' => $nombre_producto[$value],
                            'codigo_barra' => $codigo_barra_producto[$value],
                            'marca' => $marca_producto[$value],
                            'vida_util_producto' => $vida_util_producto[$value],
                            'tiempo_vida_util_producto' => $tiempo_vida_util_producto[$value],
                            'codigo_barra_producto_obs' => $codigo_barra_producto_obs[$value],
                            'nombre_producto_obs' => $nombre_producto_obs[$value],
                            'nombre_fabricante' => $nombre_fabricante[$value],
                            'nombre_fabricante_obs' => $nombre_fabricante_obs[$value],
                            'nombre_domicilio_importador' => $nombre_domicilio_importador[$value],
                            'nombre_domicilio_importador_obs' => $nombre_domicilio_importador_obs[$value],
                            'domicilio_prov' => $domicilio_prov[$value],
                            'domicilio_prov_obs' => $domicilio_prov_obs[$value],
                            'fecha_elab_envase' => $fecha_elab_envase[$value],
                            'fecha_elab_envase_obs' => $fecha_elab_envase_obs[$value],
                            'fecha_venc_dura' => $fecha_venc_dura[$value],
                            'fecha_venc_dura_obs' => $fecha_venc_dura_obs[$value],
                            'res_sanitaria' => $res_sanitaria[$value],
                            'res_sanitaria_obs' => $res_sanitaria_obs[$value],
                            'cont_neto' => $cont_neto[$value],
                            'cont_neto_obs' => $cont_neto_obs[$value],
                            'cont_drenado_escurrido' => $cont_drenado_escurrido[$value],
                            'cont_drenado_escurrido_obs' => $cont_drenado_escurrido_obs[$value],
                            'pais_origen' => $pais_origen[$value],
                            'pais_origen_obs' => $pais_origen_obs[$value],
                            'indica_uso' => $indica_uso[$value],
                            'indica_uso_obs' => $indica_uso_obs[$value],
                            'instru_almacena' => $instru_almacena[$value],
                            'instru_almacena_obs' => $instru_almacena_obs[$value],
                            'ingredientes' => $ingredientes[$value],
                            'ingredientes_obs' => $ingredientes_obs[$value],
                            'alto_calorias' => $alto_calorias[$value],
                            'alto_grasas_saturadas' => $alto_grasas_saturadas[$value],
                            'alto_azucares' => $alto_azucares[$value],
                            'alto_sodio' => $alto_sodio[$value],
                            'disco_obs' => $disco_obs[$value],
                            'razon_social_logo' => $razon_social_logo[$value],
                            'especie_logo' => $especie_logo[$value],
                            'variedad_logo' => $variedad_logo[$value],
                            'organico_logo' => $organico_logo[$value],
                            'tipo_organico_logo' => $tipo_organico_logo[$value],
                            'certificado_por_logo' => $certificado_por_logo[$value],                            
                            'entrega_muestra' => (!empty($entrega_muestra_producto[$value])) ? $entrega_muestra_producto[$value] : NULL,
                            'estado_cl' => $estado_cl[$value],
                            'observacion_solicitud' => $observacion_solicitud[$value],
                        ]);
                        if($estado_cl[$value] > 1){
                            $producto->update(['fecha_cierre' => date('Y-m-d')]);
                        }
                        if($estado_cl[$value] == 1){
                            $producto->update(['fecha_cierre' => NULL]);
                        }
                        if (!empty($imagen_producto[$value])) {
                            foreach ($imagen_producto[$value] as $imagen) {
                                if ($imagen->isValid()) {
                                    // Guarda la imagen en la librería de medios del producto
                                    $producto->addMedia($imagen)->toMediaCollection('imagenes_producto');
                                }
                            }
                        }
                        if (!empty($imagen_nutricional_producto[$value])) {
                            $imagen_nutricional = $imagen_nutricional_producto[$value];
                            if ($imagen_nutricional->isValid()) {
                                $producto->addMedia($imagen_nutricional)->toMediaCollection('imagenes_nutricional_producto');
                            }
                        }
                        if (!empty($logo_producto[$value])) {
                            $logo_prod = $logo_producto[$value];
                            if ($logo_prod->isValid()) {
                                $producto->addMedia($logo_prod)->toMediaCollection('logo_producto');
                            }
                        }
                        if (!empty($logo_oficial_sag_producto[$value])) {
                            $logo_oficial_sag = $logo_oficial_sag_producto[$value];
                            if ($logo_oficial_sag->isValid()) {
                                $producto->addMedia($logo_oficial_sag)->toMediaCollection('logo_oficial_sag_producto');
                            }
                        }
                        ///////////////////////////////////////
                        ######INSERT CERTIFICACIONES VENCIMIENTO######
                        #dd($certificacion_vencimiento_array);
                        if(!empty($certificacion_vencimiento_array[$value])){
                            foreach ($certificacion_vencimiento_array[$value] as $k => $v) {
                                if(empty($id_exist_certificacion_vencimiento[$value][$k])){
                                    
                                    $certificacion_vencimiento = BibliotecaDocumentos::create([
                                        'id_user' => Auth::user()->id,
                                        'id_solicitud' => $id,
                                        'id_prospecto' => $value,
                                        'id_proveedor' => $producto->id_proveedor,
                                        'id_documento' => $v,
                                        'fecha_emision' => $fecha_emision_v_array[$value][$k],
                                        'fecha_vencimiento' => $fecha_vencimiento_v_array[$value][$k],
                                    ]);
                                }
                                if(!empty($id_exist_certificacion_vencimiento[$value][$v])){
                                    $certificacion_vencimiento = BibliotecaDocumentos::find($id_exist_certificacion_vencimiento[$value][$v]);
                                    $certificacion_vencimiento->update([
                                        'id_documento' => $v,
                                        'fecha_emision' => $fecha_emision_v_array[$value][$k],
                                        'fecha_vencimiento' => $fecha_vencimiento_v_array[$value][$k],
                                    ]);
                                }
                                if(!empty($adjunto_v_array[$value][$k])){
                                    $adjunto_certificacion_v = $adjunto_v_array[$value][$k];
                                    if ($adjunto_certificacion_v->isValid()) {
                                        $certificacion_vencimiento->addMedia($adjunto_certificacion_v)->toMediaCollection('certificaciones_vencimiento_producto');
                                    }
                                }
                            }
                        }
                        
                        ///////////////////////////////////////
                        ######INSERT CERTIFICACIONES FIJAS######
                        foreach ($id_certificacion_fija[$value] as $k => $v) {
                            if(empty($id_exist_certificacion_fija[$value][$v]) && (!empty($nombre_laboratorio_f[$value][$v]) || !empty($fecha_vencimiento_f[$value][$v]))){
                                $certificacion_fija = BibliotecaDocumentos::create([
                                    'id_user' => Auth::user()->id,
                                    'id_solicitud' => $id,
                                    'id_prospecto' => $value,
                                    'id_proveedor' => $producto->id_proveedor,
                                    'id_documento' => $v,
                                    'nombre_laboratorio' => $nombre_laboratorio_f[$value][$v],
                                    'numero_certificado' => $numero_certificado_f[$value][$v],
                                    'fecha_analisis' => $fecha_analisis_f[$value][$v],
                                    'duracion_validez' => $duracion_validez_f[$value][$v],
                                    'fecha_vencimiento' => $fecha_vencimiento_f[$value][$v],
                                ]);
                            }
                            if(!empty($id_exist_certificacion_fija[$value][$v])){
                                $certificacion_fija = BibliotecaDocumentos::find($id_exist_certificacion_fija[$value][$v]);
                                $certificacion_fija->update([
                                    'nombre_laboratorio' => $nombre_laboratorio_f[$value][$v],
                                    'numero_certificado' => $numero_certificado_f[$value][$v],
                                    'fecha_analisis' => $fecha_analisis_f[$value][$v],
                                    'duracion_validez' => $duracion_validez_f[$value][$v],
                                    'fecha_vencimiento' => $fecha_vencimiento_f[$value][$v],
                                ]);
                            }
                            if(!empty($adjunto_f[$value][$v])){
                                $adjunto_certificacion_f = $adjunto_f[$value][$v];
                                if ($adjunto_certificacion_f->isValid()) {
                                    $certificacion_fija->addMedia($adjunto_certificacion_f)->toMediaCollection('certificaciones_fijas_producto');
                                }
                            }
                        }
                        ######DOCUMENTOS SOLICITADOS AL PROVEEDOR#####                        
                        foreach ($id_documento_solicitado_proveedor[$value] as $k => $v) {
                            if(empty($id_exist_documento_solicitado_proveedor[$value][$v]) && !empty($adjunto_documento_solicitado_proveedor[$value][$v])){
                                $documento_solicitado_proveedor_q = BibliotecaDocumentos::create([
                                    'id_solicitud' => $id,
                                    'id_prospecto' => $value,
                                    'id_proveedor' => $producto->id_proveedor,
                                    'id_documento' => $v,
                                ]);
                            }else{
                                $documento_solicitado_proveedor_q = BibliotecaDocumentos::find($id_exist_documento_solicitado_proveedor[$value][$v]);
                            }
                            if(!empty($adjunto_documento_solicitado_proveedor[$value][$v])){
                                $adjunto = $adjunto_documento_solicitado_proveedor[$value][$v];
                                if ($adjunto->isValid()) {
                                    $documento_solicitado_proveedor_q->addMedia($adjunto)->toMediaCollection('documentos_solicitados_proveedor');
                                }
                            }
                        }
                        activity()
                        ->performedOn($producto)
                        ->causedBy(Auth::user())
                        ->withProperties(['old_data' => $old_data_prod, 'new_data' => $producto])
                        ->log('Prospecto Solicitud editado');
                    }
                }
                activity()
                ->performedOn($solicitud)
                ->causedBy(Auth::user())
                ->withProperties(['old_data' => $old_data, 'new_data' => $solicitud])
                ->log('Solicitud Prospecto editada');
            });
            return redirect()->route('prospectos.edit',$id)->with('notification_type', 'success')->with('notification_message', 'Prospecto guardado correctamente!')->with('stepp',$request->input('stepp')+1);
        } catch (\Exception $e) {
            // Manejar la excepción o responder con un mensaje de error
            return redirect()->route('prospectos.edit',$id)->with('notification_type', 'danger')->with('notification_message', 'Error al guardar el Prospecto: ' . $e->getMessage());
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
    {
        //
        #$factura = Factura::withTrashed()->find($id);
        $solicitud = SolicitudProspectoProductosAca::withTrashed()->find($request->input('id'));
        if(!$solicitud){
            return response()->json(['message' => 'Solicitud no encontrada']);
        }
        $productos = ProductosSolicitudProspectosAca::withTrashed()->where('id_solicitud',$request->input('id'))->get();
        activity()
                ->performedOn($solicitud)
                ->causedBy(Auth::user())
                ->log('Solicitud Prospecto eliminada');
        $solicitud->delete();
        $productos->delete();
        return response()->json(['message' => 'Solicitud borrados con éxito']);
    }
    public function list_prospectos_proceso()
    {
        /** @var \App\Models\User */
        $user = Auth::user();
        if($user->hasRole('comercial')){            
            $data['mis_prospectos_sin_notificar'] = SolicitudProspectoProductosAca::with('productos_solicitud_prospecto','responsable_comercial','responsable_calidad')
                                                                    ->where('status',1)
                                                                    ->where('estado_solicitud', 0)
                                                                    ->where(function ($query) {
                                                                        $query->where('id_creador', Auth::user()->id)
                                                                              ->orWhere('id_comercial', Auth::user()->id);
                                                                    })->get();
        }
        $data['prospectos'] = SolicitudProspectoProductosAca::with('productos_solicitud_prospecto','responsable_comercial','responsable_calidad')
                                                                    ->where('status',1)
                                                                    ->where('estado_solicitud', '!=' ,0)
                                                                    ->where(function ($query) {
                                                                        $query->where('id_creador', '!=' ,Auth::user()->id)
                                                                                ->orWhere('id_comercial', '!=' ,Auth::user()->id)
                                                                                ->orWhere('id_calidad', '!=' ,Auth::user()->id);
                                                                    })->get();
        $data['mis_prospectos'] = SolicitudProspectoProductosAca::with('productos_solicitud_prospecto','responsable_comercial','responsable_calidad')
                                                                    ->where('status',1)
                                                                    ->where('estado_solicitud', '!=' ,0)
                                                                    ->where(function ($query) {
                                                                        $query->where('id_creador',Auth::user()->id)
                                                                                ->orWhere('id_comercial',Auth::user()->id)
                                                                                ->orWhere('id_calidad',Auth::user()->id);
                                                                    })->get();
        $data['sin_calidad_prospectos'] = SolicitudProspectoProductosAca::with('productos_solicitud_prospecto','responsable_comercial','responsable_calidad')
                                                                    ->where('status',1)
                                                                    ->where('estado_solicitud', '!=' ,0)
                                                                    ->Where('id_calidad',NULL)
                                                                    ->get();
        return view('prospectos-aca.list-proceso-prospectos', $data);
    }
    public function list_prospectos_cerrado()
    {
        $data['prospectos'] = SolicitudProspectoProductosAca::with('productos_solicitud_prospecto','responsable_comercial','responsable_calidad')
                                                                    ->where('status',2)
                                                                    ->where(function ($query) {
                                                                        $query->where('id_creador', '!=' ,Auth::user()->id)
                                                                                ->orWhere('id_comercial', '!=' ,Auth::user()->id)
                                                                                ->orWhere('id_calidad', '!=' ,Auth::user()->id);
                                                                    })->get();
        $data['mis_prospectos'] = SolicitudProspectoProductosAca::with('productos_solicitud_prospecto','responsable_comercial','responsable_calidad')
                                                                    ->where('status',2)
                                                                    ->where(function ($query) {
                                                                        $query->where('id_creador',Auth::user()->id)
                                                                                ->orWhere('id_comercial',Auth::user()->id)
                                                                                ->orWhere('id_calidad',Auth::user()->id);
                                                                    })->get();
        $data['sin_calidad_prospectos'] = SolicitudProspectoProductosAca::with('productos_solicitud_prospecto','responsable_comercial','responsable_calidad')
                                                                    ->where('status',2)
                                                                    ->orWhere('id_calidad',NULL)
                                                                    ->get();
        return view('prospectos-aca.list-cerrado-prospectos', $data);
    }

    function prospecto_PDF($id)
    {
        #User::with('sections','cc','tiendas')->findOrFail($id);
        $data = ProductosSolicitudProspectosAca::with('pais','certificaciones.documento')->findOrFail($id);        
        $proveedor = Proveedor::with('contactos_comercial')->find($data->id_proveedor);
        $data = [
            'date' => date('m/d/Y'),
            'data' => $data,
            'proveedor' => $proveedor,
        ];
        $pdf = Pdf::loadView('prospectos-aca.pdf-prospecto', $data)->setPaper('a4')->setOption(['defaultFont' => 'helvetica']);
        
        return $pdf->stream();
        #return $pdf->download('reclamo_'.$reclamo->id.'.pdf');
    }
}
