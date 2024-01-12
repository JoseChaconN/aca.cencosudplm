<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Seccion;
use App\Models\ProveedorSeccion;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ProveedoresController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function proveedores_list(Request $request)
    {
        $nombreProv=request()->input('nombreProv');
        $rutProv=request()->input('rutProv');
        $data['proveedores'] = [];
        if(!empty($nombreProv) || !empty($rutProv)){
            $data['proveedores']=Proveedor::where('rut', 'LIKE', "%$rutProv%")
                                        ->where('nombre', 'LIKE', "%$nombreProv%")
                                        ->get();
        }
        return view('proveedores.list-proveedores',$data);
    }
    public function proveedor_nuevo()
    {
        $data['proveedor']= new Proveedor;
        $data['secciones']= Seccion::where('status',1)->orderBy('nombre', 'asc')->get();
        $data['secciones_proveedor'] = [];
        $data['proveedores']= Proveedor::where('status',1)->orderBy('nombre', 'asc')->get();
        return view('proveedores.proveedor-form',$data);
    }
    public function guardar_proveedor(Request $request,$id=0)
    {
        $proveedor = Proveedor::find(request()->input('id_proveedor'));
        $proveedor_data=[            
            'nombre' => request()->input('nombre'),
            'ean' => request()->input('ean'),
            'sap' => request()->input('sap'),
            'marca' => request()->input('marca'),
            'id_seccion' => request()->input('id_seccion'),
            'pais' => request()->input('pais'),
            'tipo_alimento' => request()->input('tipo_alimento'),
            'id_proveedor' => request()->input('id_proveedor'),
            'proveedor' => $proveedor->nombre,
            'rut_proveedor' => $proveedor->rut,
            'frigorifico_switch' => request()->input('frigorifico_switch'),
            'mp' => (!empty(request()->input('mp'))) ? request()->input('mp') : 0,
        ];
        if($id==0){
            $proveedor = Producto::create($proveedor_data);
            $id = $proveedor->id;
        }else{
            $proveedor=Producto::find($id);
            $proveedor->update($proveedor_data);
        }
        return redirect()->route('editProducto', ['id' => $id])->with('notification_type', 'success')->with('notification_message', 'Producto guardado correctamente!');
    }
    public function proveedor_edit($id)
    {
        $data['proveedor'] = Proveedor::findOrFail($id);
        $secciones_proveedor = ProveedorSeccion::where('id_proveedor',$id)->get();
        $data['secciones_proveedor'] = [];
        foreach ($secciones_proveedor as $seccion) {
            $data['secciones_proveedor'][]=$seccion->codigo_seccion;
        }
        $data['secciones'] = Seccion::where('status', 1)->orderBy('nombre', 'asc')->get();
        return view('proveedores.proveedor-form',$data);
    }
    public function set_secciones_proveedor()
    {
        $proveedores = Proveedor::get();
        foreach ($proveedores as $proveedor) {
            $productos = Producto::where('id_proveedor',$proveedor->id)->get();
            ProveedorSeccion::where('id_proveedor',$proveedor->id)->delete();
            foreach ($productos as $producto) {
                $secciones_proveedor[$producto->id_seccion]=$producto->id_seccion;
            }
            foreach ($secciones_proveedor as $key => $value) {
                ProveedorSeccion::create(['id_proveedor' => $proveedor->id , 'codigo_seccion' => $value]);
            }
        }
    }
    public function buscar_proveedor(Request $request)
    {
        #$proveedores = Proveedor::all();
        $busqueda = $request->input('search');
        $proveedores_array=[];
        if(!empty($busqueda)){
            $proveedores = Proveedor::where('status' ,'=' ,1 )->where('nombre', 'LIKE', "%$busqueda%")->orWhere('rut', 'LIKE', "%$busqueda%")->get();
            foreach ($proveedores as $proveedor) {
                $btn='<div class="form-group">
                        <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input" value="'.$proveedor->id.'" name="id_proveedor" id="proveedor_'.$proveedor->id.'">
                            <label class="custom-control-label" for="proveedor_'.$proveedor->id.'">Seleccionar</label>
                        </div>
                    </div>';
                $proveedores_array[]=['id' => $proveedor->id,'nombre' => $proveedor->nombre,'rut' => $proveedor->rut , 'btn' => $btn];
            }
        }
        return response()->json($proveedores_array);

    }
}