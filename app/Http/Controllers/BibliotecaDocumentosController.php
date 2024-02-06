<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\ListadoDocumentos;
use App\Models\BibliotecaDocumentos;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\SolicitudProspectoProductosAca;
use App\Models\ProductosSolicitudProspectosAca;
use App\Models\Seccion;
use App\Models\VisitaInspectiva;
use Spatie\Tags\Tag;

class BibliotecaDocumentosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $data=[];
        $data['secciones']=Seccion::orderBy('nombre')->get();
        $data['tags'] = Tag::all();
        $tag = $request->input('tag');
        $mes_creado = (!empty($request->input('mes_creado'))) ? $request->input('mes_creado') : date('m');
        $ano_creado = (!empty($request->input('ano_creado'))) ? $request->input('ano_creado') : date('Y');
        $seccion = $request->input('seccion');
        $area = $request->input('area');
        $nombre_producto = (!empty($request->input('nombre_producto'))) ? $request->input('nombre_producto') : '%';
        $codigo_ean = (!empty($request->input('codigo_ean'))) ? $request->input('codigo_ean') : '%';
        $codigo_sap = (!empty($request->input('codigo_sap'))) ? $request->input('codigo_sap') : '%';
        $nombre_proveedor = (!empty($request->input('nombre_proveedor'))) ? $request->input('nombre_proveedor') : '%';
        $rut_proveedor = (!empty($request->input('rut_proveedor'))) ? $request->input('rut_proveedor') : '%';
        $data['request'] =$request;
        $data['documentos']=[];
        if(!empty($tag)){
            $id_documentos=[];
            $listado_documentos = ListadoDocumentos::withAnyTags($tag)->get();
            foreach ($listado_documentos as $item) {
                $id_documentos[]=$item->id;
            }
            $documentos_query = BibliotecaDocumentos::with('proveedor','producto_prospecto','producto_prospecto_importado','documento','responsable');
            
            if($mes_creado == 99){
                $documentos_query->where('created_at', 'LIKE' , "%$ano_creado%");
            }else{
                $documentos_query->where('created_at', 'LIKE' , "%$ano_creado-$mes_creado%");
            }
            
            $documentos_query->WhereHas('documento', function ($query) use ($id_documentos) {
                $query->whereIn('id', $id_documentos);
            });
            if($nombre_proveedor != '%' || $rut_proveedor != '%' ){
                $documentos_query->WhereHas('proveedor', function ($query) use ($nombre_proveedor,$rut_proveedor) {
                    $query->where('nombre', 'LIKE', "%$nombre_proveedor%");
                });
            }
            if($nombre_producto != '%' || $codigo_ean != '%' || $codigo_sap != '%'){

                /*$documentos_query->WhereHas('producto_prospecto', function ($query) use ($nombre_producto,$codigo_ean,$codigo_sap) {
                    $query->orWhere('nombre_producto', 'LIKE', "%$nombre_producto%")
                    ->orWhere('codigo_barra', 'LIKE', "%$codigo_ean%");
                });
                $documentos_query->WhereHas('producto_prospecto_importado', function ($query) use ($nombre_producto,$codigo_ean,$codigo_sap) {
                    $query->orWhere('sap', 'LIKE', "%$codigo_sap%")
                    ->orWhere('upc_bar_code', 'LIKE', "%$codigo_ean%")
                    ->orWhere('sap', 'LIKE', "%$codigo_sap%");
                });*/
                $documentos_query->where(function ($query) use ($nombre_producto, $codigo_ean, $codigo_sap) {
                    $query->orWhere(function ($subquery) use ($nombre_producto, $codigo_ean) {
                        $subquery->whereHas('producto_prospecto', function ($subsubquery) use ($nombre_producto, $codigo_ean) {
                            $subsubquery->where('nombre_producto', 'LIKE', "%$nombre_producto%")
                                         ->Where('codigo_barra', 'LIKE', "%$codigo_ean%");
                        });
                    });
                
                    $query->orWhere(function ($subquery) use ($nombre_producto,$codigo_ean, $codigo_sap) {
                        $subquery->whereHas('producto_prospecto_importado', function ($subsubquery) use ($nombre_producto,$codigo_ean, $codigo_sap) {
                            $subsubquery->where('upc_bar_code', 'LIKE', "%$codigo_ean%")
                                         ->Where('sap', 'LIKE', "%$codigo_sap%")
                                         ->Where('product_name', 'LIKE', "%$nombre_producto%"); // Nombre diferente en esta tabla
                        });
                    });
                });
            }
            
            $data['documentos'] = $documentos_query->get();

            
            foreach ($data['documentos'] as $item) {
                $doc=BibliotecaDocumentos::find($item->id);
                $mediaItems = $doc->getMedia("*");
                foreach ($mediaItems as $a) {
                    $data['adjunto_documentos'][$item->id] = $a->getUrl();
                }
            }            
        }
        return view('biblioteca.list-biblioteca',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data['tags'] = Tag::all();
        $data['listado_documentos'] = ListadoDocumentos::where('mostrar_agregar_documento_biblioteca', 1)->orderBy('nombre')->get();
        $data['documento'] = New BibliotecaDocumentos;
        return view('biblioteca.documento-form',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            DB::transaction(function () use ($request) {

                if(!empty($request->input('productos'))){
                        $adjunto = $request->file('adjunto');
                    foreach ($request->input('productos') as $key => $value) {
                        $documento = BibliotecaDocumentos::create([
                            'id_user' => Auth::user()->id,
                            'nombre_documento' => $request->input('nombre_documento'),
                            'id_documento' => $request->input('id_documento'),
                            'id_proveedor' => $request->input('proveedor'),
                            'id_producto' => $value,
                            'fecha_vencimiento' => $request->input('fecha_vencimiento'),
                            'observacion' => $request->input('observacion'),
                            'area' => $request->input('area'),
                        ]);
                        if (!empty($adjunto)) {
                            foreach ($adjunto as $item) {
                                if ($item->isValid()) {
                                    $documento->addMedia($item)->toMediaCollection('cargar-documento-biblioteca');
                                }
                            }
                        }
                    }
                }else{
                    $documento = BibliotecaDocumentos::create([
                        'id_user' => Auth::user()->id,
                        'nombre_documento' => $request->input('nombre_documento'),
                        'id_documento' => $request->input('id_documento'),
                        'id_proveedor' => $request->input('proveedor'),                        
                        'fecha_vencimiento' => $request->input('fecha_vencimiento'),
                        'observacion' => $request->input('observacion'),
                        'area' => $request->input('area'),
                    ]);
                    $adjunto = $request->file('adjunto');
                    if (!empty($adjunto)) {
                        if ($adjunto->isValid()) {
                            $documento->addMedia($adjunto)->toMediaCollection('cargar-documento-biblioteca');
                        }
                    }
                }
            });
            return redirect()->route('biblioteca.index')
                    ->with('notification_type', 'success')
                    ->with('notification_message', 'Documento creado correctamente!');
        } catch (\Exception $e) {
            #return redirect()->route('auditorias.edit',$auditoria->id)->with('notification_type', 'success')->with('notification_message', 'Auditoria creada correctamente!');
            return redirect()->route('biblioteca.create')->with('notification_type', 'danger')->with('notification_message', 'Error al crear el documento: ' . $e->getMessage());
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
        $documento = BibliotecaDocumentos::withTrashed()->find($request->input('id'));
        if(!$documento){
            return response()->json(['message' => 'Documento no encontrado']);
        }
        //$documentos = BibliotecaDocumentos::withTrashed()->where('id_auditoria',$request->input('id'));
        activity()
                ->performedOn($documento)
                ->causedBy(Auth::user())
                ->log('Documento eliminado');
        $documento->delete();
        //$documentos->delete();
        return response()->json(['message' => 'Documento borrado con éxito']);
    }
    public function delete_media(Request $request)
    {
        //
        #$factura = Factura::withTrashed()->find($id);
        if($request->input('section') == 'prospecto-producto'){
            $data = ProductosSolicitudProspectosAca::find($request->input('id_data'));
        }
        if($request->input('section') == 'auditoria'){
            $data = Auditoria::find($request->input('id_data'));
        }
        if($request->input('section') == 'visita-inspectiva'){
            $data = VisitaInspectiva::find($request->input('id_data'));
        }
        
        if(!$data){
            return response()->json(['message' => 'Documento no encontrado']);
        }
        $data->deleteMedia($request->input('id'));
        //$documentos = BibliotecaDocumentos::withTrashed()->where('id_auditoria',$request->input('id'));
        activity()
                ->performedOn($data)
                ->causedBy(Auth::user())
                ->log('Documento eliminado');
        //$documentos->delete();
        return response()->json(['message' => 'Documento borrado con éxito']);
    }
    public function buscar_proveedor(Request $request)
    {
        //
        if(!empty($request['val']) && strlen($request['val']) > 4){
            $val = $request['val'];
            $proveedores=Proveedor::where('nombre', 'LIKE' , "%$val%")->orWhere('rut','LIKE' , "%$val%")->orderBy('rut')->get();
            return response()->json(['data' => $proveedores]);
        }else{
            return response()->json();
        }
    }
    public function buscar_producto_proveedor(Request $request)
    {
        //
        if(!empty($request['val'])){
            $val = $request['val'];
            $productos=Producto::where('id_proveedor', $val)->get();
            return response()->json(['data' => $productos]);
        }else{
            return response()->json();
        }
    }
    
}
