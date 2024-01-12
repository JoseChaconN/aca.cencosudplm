<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Pais;
use App\Models\Seccion;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ProductosController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function productos_list(Request $request)
    {
        $nombreProd=request()->input('nombreProd');
        $eanProd=request()->input('eanProd');
        $sapProd=request()->input('sapProd');
        $nombreProv=request()->input('nombreProv');
        $rutProv=request()->input('rutProv');
        $data['productos'] = [];
        if(!empty($nombreProd) || !empty($eanProd) || !empty($sapProd) || !empty($nombreProv) || !empty($rutProv)){
            $data['productos']=Producto::where('productos.nombre', 'LIKE', "%$nombreProd%")
                                        ->where('ean', 'LIKE', "%$eanProd%")
                                        ->where('sap', 'LIKE', "%$sapProd%")
                                        ->where('rut_proveedor', 'LIKE', "%$rutProv%")
                                        ->where('proveedor', 'LIKE', "%$nombreProv%")
                                        ->leftJoin('secciones', 'productos.id_seccion', '=', 'secciones.id')
                                        ->select('productos.*', 'secciones.nombre as nombre_seccion')
                                        ->get();
        }
        return view('productos.list-productos',$data);
    }
    public function producto_nuevo()
    {
        $data['producto']= new Producto;
        $data['secciones']= Seccion::where('status',1)->orderBy('nombre', 'asc')->get();
        $data['paises']= Pais::orderBy('nombre', 'asc')->get();
        $data['proveedores']= Proveedor::where('status',1)->orderBy('nombre', 'asc')->get();
        return view('productos.producto-form',$data);
    }
    public function guardar_producto(Request $request,$id=0)
    {   

        $proveedor = Proveedor::find(request()->input('id_proveedor'));
        $producto_data=[            
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
            $producto = Producto::create($producto_data);
            $id = $producto->id;
        }else{
            $producto=Producto::find($id);
            $producto->update($producto_data);
        }
        return redirect()->route('editProducto', ['id' => $id])->with('notification_type', 'success')->with('notification_message', 'Producto guardado correctamente!');
    }
    public function producto_edit($id)
    {
        $data['producto'] = Producto::findOrFail($id);
        $data['secciones']= Seccion::where('status',1)->orderBy('nombre', 'asc')->get();
        $data['paises']= Pais::orderBy('nombre', 'asc')->get();
        $data['proveedores']= Proveedor::where('status',1)->orderBy('nombre', 'asc')->get();
        return view('productos.producto-form',$data);
    }
}
