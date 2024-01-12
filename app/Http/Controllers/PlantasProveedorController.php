<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\PlantasProveedor;
use App\Models\Proveedor;
use Illuminate\Support\Facades\DB;

class PlantasProveedorController extends Controller
{
    public function plantas_list(Request $request)
    {
        $nombreProv=request()->input('nombreProv');
        $rutProv=request()->input('rutProv');
        $data['plantas'] = PlantasProveedor::with('proveedor')->get();
        /*if(!empty($nombreProd) || !empty($eanProd) || !empty($sapProd) || !empty($nombreProv) || !empty($rutProv)){
            $data['productos']=PlantasProveedor::where('productos.nombre', 'LIKE', "%$nombreProd%")
                                        ->where('ean', 'LIKE', "%$eanProd%")
                                        ->where('sap', 'LIKE', "%$sapProd%")
                                        ->where('rut_proveedor', 'LIKE', "%$rutProv%")
                                        ->where('proveedor', 'LIKE', "%$nombreProv%")
                                        ->leftJoin('secciones', 'productos.id_seccion', '=', 'secciones.id')
                                        ->select('productos.*', 'secciones.nombre as nombre_seccion')
                                        ->get();
        }*/
        return view('plantas-proveedor.index',$data);
    }
    /**
     * Display a listing of the resource.
     */
    public function pre_create(Request $request)
    {
        //
        $nombreProv=$request->input('nombreProv');
        $rutProv=$request->input('rutProv');
        $data['proveedores'] = [];
        $data['request'] = $request->input();
        if(!empty($nombreProv) || !empty($rutProv)){
            $proveedores = Proveedor::where('status',1);
            if(!empty($nombreProv)){
                $proveedores->where('nombre', 'LIKE', "%$nombreProv%");
            }
            if(!empty($rutProv)){
                $proveedores->where('rut', 'LIKE', "%$rutProv%");
            }
            $data['proveedores'] = $proveedores->get();
        }
        return view('plantas-proveedor.pre-create',$data);
    }
    public function index()
    {
        //
        $data['plantas'] = PlantasProveedor::with('proveedor')->get();
        return view('plantas-proveedor.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $data['planta'] = new PlantasProveedor;
        $data['proveedor'] = Proveedor::findOrfail($request->input('id_proveedor'));
        return view('plantas-proveedor.plantas-form',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $id = null;
        try {
            DB::transaction(function () use ($request,&$id) {
                $planta_proveedor=PlantasProveedor::create([
                    'id_proveedor' => $request->input('id_proveedor'),
                    'nombre' => $request->input('nombre'),
                    'direccion' => $request->input('direccion'),
                ]);
                $documento_planta = $request->file('documento');
                if(!empty($documento_planta)){
                    $doc = $documento_planta;
                    if ($doc->isValid()) {
                        // Guarda la imagen en la librería de medios del producto
                        $planta_proveedor->addMedia($doc)->toMediaCollection('resolucion_sanitaria_planta');
                    }
                }
                $id = $planta_proveedor->id;
            });
            return redirect()->route('plantas-proveedor.edit',$id)
            ->with('notification_type', 'success')
            ->with('notification_message', '¡Planta creada correctamente!');
            
        } catch (\Exception $e) {
            return redirect()->route('plantas-proveedor.create',['id_proveedor' => $request->input('id_proveedor')])->with('notification_type', 'danger')->with('notification_message', 'Error al guardar la planta: ' . $e->getMessage());
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
        $data['planta'] = PlantasProveedor::with('proveedor')->findOrFail($id);
        return view('plantas-proveedor.plantas-form',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            DB::transaction(function () use ($request,&$id) {
                $planta_proveedor = PlantasProveedor::findOrFail($id);
                $old_data = $planta_proveedor->getOriginal();
                $planta_proveedor->update([
                    'nombre' => $request->input('nombre'),
                    'direccion' => $request->input('direccion'),
                ]);
                $documento_planta = $request->file('documento');
                if(!empty($documento_planta)){
                    $doc = $documento_planta;
                    if ($doc->isValid()) {
                        // Guarda la imagen en la librería de medios del producto
                        $planta_proveedor->addMedia($doc)->toMediaCollection('resolucion_sanitaria_planta');
                    }
                }
                activity()
                ->performedOn($planta_proveedor)
                ->causedBy(Auth::user())
                ->withProperties(['old_data' => $old_data, 'new_data' => $planta_proveedor])
                ->log('Planta Proveedor editado');
                $id = $planta_proveedor->id;
            });
            return redirect()->route('plantas-proveedor.edit',$id)
            ->with('notification_type', 'success')
            ->with('notification_message', '¡Planta actualizada correctamente!');
            
        } catch (\Exception $e) {
            return redirect()->route('plantas-proveedor.edit',$id)->with('notification_type', 'danger')->with('notification_message', 'Error al guardar la planta: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $planta_proveedor = PlantasProveedor::find($id);
        $old_data = $planta_proveedor->getOriginal();
        $planta_proveedor->clearMediaCollection('resolucion_sanitaria_planta');
        activity()
        ->performedOn($planta_proveedor)
        ->causedBy(Auth::user())
        ->withProperties(['old_data' => $old_data])
        ->log('Eliminar resolucion sanitaria');
    }
}
