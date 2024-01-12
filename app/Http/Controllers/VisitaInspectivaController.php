<?php

namespace App\Http\Controllers;

use App\Models\VisitaInspectiva;
use App\Models\ListadoDocumentos;
use App\Models\BibliotecaDocumentos;
use App\Models\OrganismoAuditor;
use App\Models\Proveedor;
use App\Models\PlantasProveedor;
use App\Models\Seccion;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

class VisitaInspectivaController extends Controller
{
    //
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        $data['breadcrumb'] = 'Listado de Visitas Inspectivas';
        $data['mis_visitas_inspectivas'] = VisitaInspectiva::with('proveedor','responsable','seccion_visita_inspectiva')->where('id_responsable',Auth::user()->id)->get();        
        $data['otras_visitas_inspectivas'] = VisitaInspectiva::with('proveedor','responsable','seccion_visita_inspectiva')->where('id_responsable', '!=',Auth::user()->id)->get();
        #$data = ['proveedores' => $proveedores , 'request' => request()->input()];
        return view('visitas-inspectivas.list-visita-inspectiva',$data);
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
        return view('visitas-inspectivas.pre-visita-inspectiva',$data);
        
    }
    /**
     * Show the form for creating a new resource.
     */
    public function new($id)
    {
        //
        $data['breadcrumb'] = 'Visitas Inspectivas Nueva';
        $data['visita'] = new VisitaInspectiva();#VisitaInspectiva::find($id);
        $data['proveedor'] = Proveedor::with('plantas')->find($id);
        $data['secciones'] = Seccion::where('status', 1)->orderBy('nombre')->get();
        $data['organismos_auditores'] = OrganismoAuditor::orderBy('nombre')->get();
        $data['certficaciones_vencimiento'] = ListadoDocumentos::where('mostrar_auditoria', 1)->orderBy('nombre')->get();
        $data['imagenes_auditoria']= [];
        $data['visita_auditorias']= [];
        $data['visita_documentos']= [];
        $data['certificacion_vencimiento_exist']=[];
        #$data = ['breadcrumb' => 'Auditoria Nueva' ,'proveedor' => $proveedor, 'secciones' => $secciones, 'organismos_auditores' => $organismoAuditor, 'certficaciones_vencimiento' => $certificacionesVencimiento, 'auditoria' => new Auditoria];
        return view('visitas-inspectivas.visita-inspectiva-form',$data);
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
        $visita = NULL;
        try {
            DB::transaction(function () use ($request, &$visita) {
                $visita = VisitaInspectiva::create([
                    'id_proveedor' => $request->input('id_proveedor'),
                    'id_responsable' => Auth::user()->id,
                    'fecha_visita' => date('Y-m-d'),
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
                    'status' => 1
                ]);
                #FOTOGRAFIAS
                $fotografia = $request->file('fotografia');
                if (!empty($fotografia)) {
                    foreach ($fotografia as $imagen) {
                        if ($imagen->isValid()) {
                            // Guarda la imagen en la librería de medios del producto
                            $visita->addMedia($imagen)->toMediaCollection('imagenes');
                        }
                    }
                }
                #AUDITORIAS
                $titulo_documento_auditoria = $request->input('titulo_documento_auditoria');
                $adjunto_auditoria = $request->file('adjunto_auditoria');
                if (!empty($titulo_documento_auditoria) && !empty($adjunto_auditoria)) {
                    foreach ($titulo_documento_auditoria as $key => $value) {
                        $visitas_doc = BibliotecaDocumentos::create([
                            'id_user' => Auth::user()->id,
                            'id_documento' => 56,
                            'id_visita_inspectiva' => $visita->id,
                            'id_proveedor' => $visita->id_proveedor,
                            'nombre_documento' => $value,
                        ]);
                        if(!empty($adjunto_auditoria)){
                            $adjunto = $adjunto_auditoria[$key];
                            if ($adjunto->isValid()) {
                                $visitas_doc->addMedia($adjunto)->toMediaCollection('visita-auditorias');
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
                            'id_visita_inspectiva' => $visita->id,
                            'id_proveedor' => $visita->id_proveedor,
                            'nombre_documento' => $value,
                        ]);
                        if(!empty($adjunto_documento)){
                            $adjunto = $adjunto_documento[$key];
                            if ($adjunto->isValid()) {
                                $documentos_doc->addMedia($adjunto)->toMediaCollection('visita-documentos');
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
                        $visitas_doc = BibliotecaDocumentos::create([
                            'id_user' => Auth::user()->id,
                            'id_visita_inspectiva' => $visita->id,
                            'id_proveedor' => $visita->id_proveedor,
                            'id_documento' => $value,
                            'fecha_emision' => $fecha_emision[$key],
                            'fecha_vencimiento' => $fecha_vencimiento[$key],
                        ]);
                        if(!empty($adjunto_certificacion_vencimiento)){
                            $adjunto = $adjunto_certificacion_vencimiento[$key];
                            if ($adjunto->isValid()) {
                                $visitas_doc->addMedia($adjunto)->toMediaCollection('certificacion-vencimiento');
                            }
                        }
                    }
                }
            });
            if ($visita !== null) {
                return redirect()->route('visita.inspectiva.edit', $visita->id)
                    ->with('notification_type', 'success')
                    ->with('notification_message', 'Auditoría creada correctamente!');
            }
            #return redirect()->route('visita.inspectiva.edit',$visita->id)->with('notification_type', 'success')->with('notification_message', 'Auditoria creada correctamente!');
        } catch (\Exception $e) {
            #return redirect()->route('visita.inspectiva.edit',$visita->id)->with('notification_type', 'success')->with('notification_message', 'Auditoria creada correctamente!');
            return redirect()->route('visita.inspectiva.new',$request->input('id_proveedor'))->with('notification_type', 'danger')->with('notification_message', 'Error al crear la auditoría: ' . $e->getMessage());
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
        $data['breadcrumb'] = 'Visita Inspectiva';
        $data['visita'] = VisitaInspectiva::find($id);
        $data['proveedor'] = Proveedor::with('plantas')->find($data['visita']->id_proveedor);
        $data['secciones'] = Seccion::where('status', 1)->orderBy('nombre')->get();
        $data['organismos_auditores'] = OrganismoAuditor::orderBy('nombre')->get();
        $data['certficaciones_vencimiento'] = ListadoDocumentos::where('mostrar_auditoria', 1)->orderBy('nombre')->get();        
        $data['imagenes_auditoria']= [];
        $data['visita_auditorias']= [];
        $data['visita_documentos']= [];
        $data['certificacion_vencimiento_exist']=[];
        $imagen_auditoria = $data['visita']->getMedia('imagenes');
        if(!empty($imagen_auditoria)){
            foreach ($imagen_auditoria as $item) {
                $data['imagenes_auditoria'][] = ['id' => $item->id , 'url' => $item->getUrl()];
            }
        }
        /*$visita_auditorias = $data['auditoria']->getMedia('auditoria-auditorias');
        if(!empty($visita_auditorias)){
            foreach ($visita_auditorias as $item) {
                $data['auditoria_auditorias'][] = ['id' => $item->id , 'url' => $item->getUrl()];
            }
        }
        $visita_documentos = $data['auditoria']->getMedia('auditoria-documentos');
        if(!empty($visita_documentos)){
            foreach ($visita_documentos as $item) {
                $data['auditoria_documentos'][] = ['id' => $item->id , 'url' => $item->getUrl()];
            }
        }*/
        $visita_auditorias = BibliotecaDocumentos::where('id_visita_inspectiva',$data['visita']->id)->where('id_documento',56)->get();
        foreach ($visita_auditorias as $item) {
            $data['visita_auditorias'][] = $item;
            $adjunto_visista_auditorias = $item->getMedia('visita-auditorias');
            if(!empty($adjunto_visista_auditorias)){
                foreach ($adjunto_visista_auditorias as $value) {
                    $data['adjunto_visita_auditorias'][] = ['id' => $value->id , 'url' => $value->getUrl()];
                }
            }
        }
        $visita_documentos = BibliotecaDocumentos::where('id_visita_inspectiva',$data['visita']->id)->where('id_documento',57)->get();
        foreach ($visita_documentos as $item) {
            $data['visita_documentos'][] = $item;
            $adjunto_visita_documentos = $item->getMedia('visita-documentos');
            if(!empty($adjunto_visita_documentos)){
                foreach ($adjunto_visita_documentos as $value) {
                    $data['adjunto_visita_documentos'][] = ['id' => $value->id , 'url' => $value->getUrl()];
                }
            }
        }        
        foreach ($data['certficaciones_vencimiento'] as $item) {
            $certificacion_vencimiento = BibliotecaDocumentos::where('id_visita_inspectiva',$data['visita']->id)->where('id_documento',$item->id)->get();
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
        return view('visitas-inspectivas.visita-inspectiva-form',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
        try {
            DB::transaction(function () use ($request, &$id) {

                $visita = VisitaInspectiva::find($id);
                $old_data = $visita->getOriginal();
                $visita->update([
                    'fecha_ejecucion' => $request->input('fecha_ejecucion'),
                    'area' => $request->input('area'),
                    'programa' => $request->input('programa'),
                    'id_seccion' => $request->input('id_seccion'),
                    'organismo_auditor' => $request->input('organismo_auditor'),
                    'id_planta' => $request->input('id_planta'),
                    'porcentaje' => $request->input('porcentaje'),
                    'observaciones' => $request->input('observaciones'),
                    'conclusiones' => $request->input('conclusiones'),
                    'linea_proceso' => $request->input('linea_proceso')
                ]);
                #FOTOGRAFIAS
                $fotografia = $request->file('fotografia');
                if (!empty($fotografia)) {
                    foreach ($fotografia as $imagen) {
                        if ($imagen->isValid()) {
                            // Guarda la imagen en la librería de medios del producto
                            $visita->addMedia($imagen)->toMediaCollection('imagenes');
                        }
                    }
                }
                #AUDITORIAS
                $titulo_documento_auditoria = $request->input('titulo_documento_auditoria');
                $adjunto_auditoria = $request->file('adjunto_auditoria');
                if (!empty($titulo_documento_auditoria) && !empty($adjunto_auditoria)) {
                    foreach ($titulo_documento_auditoria as $key => $value) {
                        $visitas_doc = BibliotecaDocumentos::create([
                            'id_user' => Auth::user()->id,
                            'id_documento' => 56,
                            'id_visita_inspectiva' => $visita->id,
                            'id_proveedor' => $visita->id_proveedor,
                            'nombre_documento' => $value,
                        ]);
                        if(!empty($adjunto_auditoria)){
                            $adjunto = $adjunto_auditoria[$key];
                            if ($adjunto->isValid()) {
                                $visitas_doc->addMedia($adjunto)->toMediaCollection('visita-auditorias');
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
                            'id_visita_inspectiva' => $visita->id,
                            'id_proveedor' => $visita->id_proveedor,
                            'nombre_documento' => $value,
                        ]);
                        if(!empty($adjunto_documento)){
                            $adjunto = $adjunto_documento[$key];
                            if ($adjunto->isValid()) {
                                $documentos_doc->addMedia($adjunto)->toMediaCollection('visita-documentos');
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
                        $visitas_doc = BibliotecaDocumentos::create([
                            'id_user' => Auth::user()->id,
                            'id_visita_inspectiva' => $visita->id,
                            'id_proveedor' => $visita->id_proveedor,
                            'id_documento' => $value,
                            'fecha_emision' => $fecha_emision[$key],
                            'fecha_vencimiento' => $fecha_vencimiento[$key],
                        ]);
                        if(!empty($adjunto_certificacion_vencimiento)){
                            $adjunto = $adjunto_certificacion_vencimiento[$key];
                            if ($adjunto->isValid()) {
                                $visitas_doc->addMedia($adjunto)->toMediaCollection('certificacion-vencimiento');
                            }
                        }
                    }
                }
                activity()
                ->performedOn($visita)
                ->causedBy(Auth::user())
                ->withProperties(['old_data' => $old_data, 'new_data' => $visita])
                ->log('Visita Inspectiva editada');
            });
            if ($id !== null) {
                return redirect()->route('visita.inspectiva.edit', $id)
                    ->with('notification_type', 'success')
                    ->with('notification_message', 'Visita Inspectiva guardada correctamente!');
            }
            #return redirect()->route('visita.inspectiva.edit',$visita->id)->with('notification_type', 'success')->with('notification_message', 'Auditoria creada correctamente!');
        } catch (\Exception $e) {
            #return redirect()->route('visita.inspectiva.edit',$visita->id)->with('notification_type', 'success')->with('notification_message', 'Auditoria creada correctamente!');
            return redirect()->route('visita.inspectiva.edit',$id)->with('notification_type', 'danger')->with('notification_message', 'Error al crear la auditoría: ' . $e->getMessage());
        }  
    }

    public function delete(Request $request)
    {
        //
        #$factura = Factura::withTrashed()->find($id);
        $visita = VisitaInspectiva::withTrashed()->find($request->input('id'));
        if(!$visita){
            return response()->json(['message' => 'Visita Inspectiva no encontrada']);
        }
        $documentos = BibliotecaDocumentos::withTrashed()->where('id_visita_inspectiva',$request->input('id'));
        activity()
                ->performedOn($visita)
                ->causedBy(Auth::user())
                ->log('Visita Inspectiva eliminada');
        $visita->delete();
        $documentos->delete();
        return response()->json(['message' => 'Visita Inspectiva borrada con éxito']);
    }
}
