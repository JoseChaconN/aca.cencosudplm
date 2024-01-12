<?php

namespace App\Http\Controllers;


use App\Models\Auditoria;
use App\Models\ListadoDocumentos;
use App\Models\BibliotecaDocumentos;
use App\Models\OrganismoAuditor;
use App\Models\Proveedor;
use App\Models\PlantasProveedor;
use App\Models\Seccion;
use Spatie\Activitylog\Models\Activity;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Traits\LogsActivity;

class AuditoriasController extends Controller
{
    //
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        $data['breadcrumb'] = 'Listado de Auditorías';
        $data['mis_auditorias'] = Auditoria::with('proveedor','responsable','seccion_auditoria')->where('id_responsable',Auth::user()->id)->get();        
        $data['otras_auditorias'] = Auditoria::with('proveedor','responsable','seccion_auditoria')->where('id_responsable', '!=',Auth::user()->id)->get();
        #$data = ['proveedores' => $proveedores , 'request' => request()->input()];
        return view('auditorias.list-auditoria',$data);
    }
    public function pre_create(Request $request)
    {
        //
        $nombreProv=request()->input('nombreProv');
        $rutProv=request()->input('rutProv');
        $proveedores = NULL;
        if(!empty($nombreProv) || !empty($rutProv)){
            $proveedores = Proveedor::where('nombre', 'LIKE', "%$nombreProv%")
                                    ->where('rut', 'LIKE', "%$rutProv%")
                                    ->get();
        }

        $data = ['proveedores' => $proveedores , 'request' => request()->input()];
        return view('auditorias.pre-auditoria',$data);
        
    }
    /**
     * Show the form for creating a new resource.
     */
    public function new($id)
    {
        //
        $data['breadcrumb'] = 'Auditoria Nueva';
        $data['auditoria'] = new Auditoria;#Auditoria::find($id);
        $data['proveedor'] = Proveedor::with('plantas')->find($id);
        $data['secciones'] = Seccion::where('status', 1)->orderBy('nombre')->get();
        $data['organismos_auditores'] = OrganismoAuditor::orderBy('nombre')->get();
        $data['certficaciones_vencimiento'] = ListadoDocumentos::where('mostrar_auditoria', 1)->orderBy('nombre')->get();
        $data['imagenes_auditoria']= [];
        $data['auditoria_auditorias']= [];
        $data['auditoria_documentos']= [];
        $data['certificacion_vencimiento_exist']=[];
        #$data = ['breadcrumb' => 'Auditoria Nueva' ,'proveedor' => $proveedor, 'secciones' => $secciones, 'organismos_auditores' => $organismoAuditor, 'certficaciones_vencimiento' => $certificacionesVencimiento, 'auditoria' => new Auditoria];
        return view('auditorias.auditoria-form',$data);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        //        
    }
   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $auditoria = NULL;
        try {
            DB::transaction(function () use ($request, &$auditoria) {
                $auditoria = Auditoria::create([
                    'id_proveedor' => $request->input('id_proveedor'),
                    'id_responsable' => Auth::user()->id,
                    'fecha_auditoria' => date('Y-m-d'),
                    'fecha_ejecucion' => $request->input('fecha_ejecucion'),
                    'area' => $request->input('area'),
                    'programa' => $request->input('programa'),
                    'id_seccion' => $request->input('id_seccion'),
                    'organismo_auditor' => $request->input('organismo_auditor'),
                    'id_planta' => $request->input('id_planta'),
                    'porcentaje' => $request->input('porcentaje'),
                    'observaciones' => $request->input('observaciones'),
                    'conclusiones' => $request->input('conclusiones'),
                    'linea_proceso' => $request->input('linea_proceso'),
                ]);
                #FOTOGRAFIAS
                $fotografia = $request->file('fotografia');
                if (!empty($fotografia)) {
                    foreach ($fotografia as $imagen) {
                        if ($imagen->isValid()) {
                            // Guarda la imagen en la librería de medios del producto
                            $auditoria->addMedia($imagen)->toMediaCollection('imagenes');
                        }
                    }
                }
                #AUDITORIAS
                $titulo_documento_auditoria = $request->input('titulo_documento_auditoria');
                $adjunto_auditoria = $request->file('adjunto_auditoria');
                if (!empty($titulo_documento_auditoria) && !empty($adjunto_auditoria)) {
                    foreach ($titulo_documento_auditoria as $key => $value) {
                        $auditorias_doc = BibliotecaDocumentos::create([
                            'id_user' => Auth::user()->id,
                            'id_documento' => 56,
                            'id_auditoria' => $auditoria->id,
                            'id_proveedor' => $auditoria->id_proveedor,
                            'nombre_documento' => $value,
                        ]);
                        if(!empty($adjunto_auditoria)){
                            $adjunto = $adjunto_auditoria[$key];
                            if ($adjunto->isValid()) {
                                $auditorias_doc->addMedia($adjunto)->toMediaCollection('auditoria-auditorias');
                            }
                        }
                    }
                }
                #DOCUMENTOS
                $titulo_documento = $request->input('titulo_documento');
                $adjunto_documento = $request->file('adjunto_documento');
                if (!empty($titulo_documento) && !empty($adjunto_documento)) {
                    foreach ($titulo_documento as $key => $value) {
                        $documentos_doc = BibliotecaDocumentos::create([
                            'id_user' => Auth::user()->id,
                            'id_documento' => 57,
                            'id_auditoria' => $auditoria->id,
                            'id_proveedor' => $auditoria->id_proveedor,
                            'nombre_documento' => $value,
                        ]);
                        if(!empty($adjunto_documento)){
                            $adjunto = $adjunto_documento[$key];
                            if ($adjunto->isValid()) {
                                $documentos_doc->addMedia($adjunto)->toMediaCollection('auditoria-documentos');
                            }
                        }
                    }
                }
                #CERTIFICACIONES VENCIMIENTO
                $id_certificacion = $request->input('id_certificacion');
                $fecha_emision = $request->input('fecha_emision');
                $fecha_vencimiento = $request->input('fecha_vencimiento');
                $adjunto_certificacion_vencimiento = $request->file('adjunto_certificacion_vencimiento');
                if (!empty($id_certificacion) && !empty($adjunto_certificacion_vencimiento)) {
                    foreach ($id_certificacion as $key => $value) {
                        $auditorias_doc = BibliotecaDocumentos::create([
                            'id_user' => Auth::user()->id,
                            'id_auditoria' => $auditoria->id,
                            'id_proveedor' => $auditoria->id_proveedor,
                            'id_documento' => $value,
                            'fecha_emision' => $fecha_emision[$key],
                            'fecha_vencimiento' => $fecha_vencimiento[$key],
                        ]);
                        if(!empty($adjunto_certificacion_vencimiento)){
                            $adjunto = $adjunto_certificacion_vencimiento[$key];
                            if ($adjunto->isValid()) {
                                $auditorias_doc->addMedia($adjunto)->toMediaCollection('certificacion-vencimiento');
                            }
                        }
                    }
                }
            });
            if ($auditoria !== null) {
                return redirect()->route('auditorias.edit', $auditoria->id)
                    ->with('notification_type', 'success')
                    ->with('notification_message', 'Auditoría creada correctamente!');
            }
            #return redirect()->route('auditorias.edit',$auditoria->id)->with('notification_type', 'success')->with('notification_message', 'Auditoria creada correctamente!');
        } catch (\Exception $e) {
            #return redirect()->route('auditorias.edit',$auditoria->id)->with('notification_type', 'success')->with('notification_message', 'Auditoria creada correctamente!');
            return redirect()->route('auditorias.new',$request->input('id_proveedor'))->with('notification_type', 'danger')->with('notification_message', 'Error al crear la auditoría: ' . $e->getMessage());
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
        //
        $data['breadcrumb'] = 'Auditoria';
        $data['auditoria'] = Auditoria::find($id);
        $data['proveedor'] = Proveedor::with('plantas')->find($data['auditoria']->id_proveedor);
        $data['secciones'] = Seccion::where('status', 1)->orderBy('nombre')->get();
        $data['organismos_auditores'] = OrganismoAuditor::orderBy('nombre')->get();
        $data['certficaciones_vencimiento'] = ListadoDocumentos::where('mostrar_auditoria', 1)->orderBy('nombre')->get();        
        $data['imagenes_auditoria']= [];
        $data['auditoria_auditorias']= [];
        $data['auditoria_documentos']= [];
        $data['certificacion_vencimiento_exist']=[];
        $imagen_auditoria = $data['auditoria']->getMedia('imagenes');
        if(!empty($imagen_auditoria)){
            foreach ($imagen_auditoria as $item) {
                $data['imagenes_auditoria'][] = ['id' => $item->id , 'url' => $item->getUrl()];
            }
        }
        $auditoria_auditorias = BibliotecaDocumentos::where('id_auditoria',$data['auditoria']->id)->where('id_documento',56)->get();
        foreach ($auditoria_auditorias as $item) {
            $data['auditoria_auditorias'][] = $item;
            $adjunto_auditoria_auditorias = $item->getMedia('auditoria-auditorias');
            if(!empty($adjunto_auditoria_auditorias)){
                foreach ($adjunto_auditoria_auditorias as $value) {
                    $data['adjunto_auditoria_auditorias'][] = ['id' => $value->id , 'url' => $value->getUrl()];
                }
            }
        }
        $auditoria_documentos = BibliotecaDocumentos::where('id_auditoria',$data['auditoria']->id)->where('id_documento',57)->get();
        foreach ($auditoria_documentos as $item) {
            $data['auditoria_documentos'][] = $item;
            $adjunto_auditoria_documentos = $item->getMedia('auditoria-documentos');
            if(!empty($adjunto_auditoria_documentos)){
                foreach ($adjunto_auditoria_documentos as $value) {
                    $data['adjunto_auditoria_documentos'][] = ['id' => $value->id , 'url' => $value->getUrl()];
                }
            }
        }        
        foreach ($data['certficaciones_vencimiento'] as $item) {
            $certificacion_vencimiento = BibliotecaDocumentos::where('id_auditoria',$data['auditoria']->id)->where('id_documento',$item->id)->get();
            foreach ($certificacion_vencimiento as $value) {
                $data['certificacion_vencimiento_exist'][$value->id]['name'] = $item->nombre;
                $data['certificacion_vencimiento_exist'][$value->id]['data'] = $value;
                $adjunto_certificacion_vencimiento = $value->getMedia('certificacion-vencimiento');
                if(!empty($adjunto_certificacion_vencimiento)){
                    foreach ($adjunto_certificacion_vencimiento as $v) {
                        $data['certificacion_vencimiento_exist'][$value->id]['adjunto'] = ['id' => $v->id , 'url' => $v->getUrl()];
                    }
                }
            }
        }
        return view('auditorias.auditoria-form',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
        //
        try {
            DB::transaction(function () use ($request, &$id) {
                $auditoria = Auditoria::find($id);
                $old_data = $auditoria->getOriginal();
                $auditoria->update([
                    'fecha_auditoria' => date('Y-m-d'),
                    'fecha_ejecucion' => $request->input('fecha_ejecucion'),
                    'area' => $request->input('area'),
                    'programa' => $request->input('programa'),
                    'id_seccion' => $request->input('id_seccion'),
                    'organismo_auditor' => $request->input('organismo_auditor'),
                    'id_planta' => $request->input('id_planta'),
                    'porcentaje' => $request->input('porcentaje'),
                    'observaciones' => $request->input('observaciones'),
                    'conclusiones' => $request->input('conclusiones'),
                    'linea_proceso' => $request->input('linea_proceso'),
                ]);
                #FOTOGRAFIAS
                $fotografia = $request->file('fotografia');
                if (!empty($fotografia)) {
                    foreach ($fotografia as $imagen) {
                        if ($imagen->isValid()) {
                            // Guarda la imagen en la librería de medios del producto
                            $auditoria->addMedia($imagen)->toMediaCollection('imagenes');
                        }
                    }
                }
                #AUDITORIAS
                $titulo_documento_auditoria = $request->input('titulo_documento_auditoria');
                $adjunto_auditoria = $request->file('adjunto_auditoria');
                if (!empty($titulo_documento_auditoria) && !empty($adjunto_auditoria)) {
                    foreach ($titulo_documento_auditoria as $key => $value) {
                        $auditorias_doc = BibliotecaDocumentos::create([
                            'id_user' => Auth::user()->id,
                            'id_documento' => 56,
                            'id_auditoria' => $auditoria->id,
                            'id_proveedor' => $auditoria->id_proveedor,
                            'nombre_documento' => $value,
                        ]);
                        if(!empty($adjunto_auditoria)){
                            $adjunto = $adjunto_auditoria[$key];
                            if ($adjunto->isValid()) {
                                $auditorias_doc->addMedia($adjunto)->toMediaCollection('auditoria-auditorias');
                            }
                        }
                    }
                }
                #DOCUMENTOS
                $titulo_documento = $request->input('titulo_documento');
                $adjunto_documento = $request->file('adjunto_documento');
                if (!empty($titulo_documento) && !empty($adjunto_documento)) {
                    foreach ($titulo_documento as $key => $value) {
                        $documentos_doc = BibliotecaDocumentos::create([
                            'id_user' => Auth::user()->id,
                            'id_documento' => 57,
                            'id_auditoria' => $auditoria->id,
                            'id_proveedor' => $auditoria->id_proveedor,
                            'nombre_documento' => $value,
                        ]);
                        if(!empty($adjunto_documento)){
                            $adjunto = $adjunto_documento[$key];
                            if ($adjunto->isValid()) {
                                $documentos_doc->addMedia($adjunto)->toMediaCollection('auditoria-documentos');
                            }
                        }
                    }
                }
                #CERTIFICACIONES VENCIMIENTO
                $id_certificacion = $request->input('id_certificacion');
                $fecha_emision = $request->input('fecha_emision');
                $fecha_vencimiento = $request->input('fecha_vencimiento');
                $adjunto_certificacion_vencimiento = $request->file('adjunto_certificacion_vencimiento');
                if (!empty($id_certificacion) && !empty($adjunto_certificacion_vencimiento)) {
                    foreach ($id_certificacion as $key => $value) {
                        $auditorias_doc = BibliotecaDocumentos::create([
                            'id_user' => Auth::user()->id,
                            'id_auditoria' => $auditoria->id,
                            'id_proveedor' => $auditoria->id_proveedor,
                            'id_documento' => $value,
                            'fecha_emision' => $fecha_emision[$key],
                            'fecha_vencimiento' => $fecha_vencimiento[$key],
                        ]);
                        if(!empty($adjunto_certificacion_vencimiento)){
                            $adjunto = $adjunto_certificacion_vencimiento[$key];
                            if ($adjunto->isValid()) {
                                $auditorias_doc->addMedia($adjunto)->toMediaCollection('certificacion-vencimiento');
                            }
                        }
                    }
                }
                activity()
                ->performedOn($auditoria)
                ->causedBy(Auth::user())
                ->withProperties(['old_data' => $old_data, 'new_data' => $auditoria])
                ->log('Auditoría editada');
                #->withCauser($auditoria->id);
            });
            if ($id !== null) {
                return redirect()->route('auditorias.edit', $id)
                    ->with('notification_type', 'success')
                    ->with('notification_message', 'Auditoría guardada correctamente!');
            }
            #return redirect()->route('auditorias.edit',$auditoria->id)->with('notification_type', 'success')->with('notification_message', 'Auditoria creada correctamente!');
        } catch (\Exception $e) {
            #return redirect()->route('auditorias.edit',$auditoria->id)->with('notification_type', 'success')->with('notification_message', 'Auditoria creada correctamente!');
            return redirect()->route('auditorias.edit',$id)->with('notification_type', 'danger')->with('notification_message', 'Error al crear la auditoría: ' . $e->getMessage());
        }  
    }

    public function delete(Request $request)
    {
        //
        #$factura = Factura::withTrashed()->find($id);
        $auditoria = Auditoria::withTrashed()->find($request->input('id'));
        if(!$auditoria){
            return response()->json(['message' => 'Auditoría no encontrada']);
        }
        $documentos = BibliotecaDocumentos::withTrashed()->where('id_auditoria',$request->input('id'));
        activity()
                ->performedOn($auditoria)
                ->causedBy(Auth::user())
                ->log('Auditoría eliminada');
        $auditoria->delete();
        $documentos->delete();
        return response()->json(['message' => 'Auditoría borrada con éxito']);
    }
}
