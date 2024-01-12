<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class UsuariosController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    /*public function index()
    {
        return view('reclamos.index');
    }*/
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin|administrador|tecnólogo')->except('guardar_usuario','usuario_edit');
        #$this->middleware('role:admin|administrador|tecnologo|tienda')->only('reclamo','reclamo_nuevo','guardar_reclamo_nuevo','reclamo_PDF');
    }

    public function guardar_usuario(Request $request,$id=0)
    {

        $cc = (!empty(request()->input('cc'))) ? request()->input('cc') : [];#request()->input('cc');
        $secciones_aca = (!empty(request()->input('secciones_aca'))) ? request()->input('secciones_aca') : [];
        $tiendas = (!empty(request()->input('tiendas'))) ? request()->input('tiendas') : [];
        $tiendas_supervisor = (!empty(request()->input('tiendas_supervisor'))) ? request()->input('tiendas_supervisor') : [];
        $cc_array=[];
        $secciones_aca_array=[];
        $tiendas_array=[];
        $tiendas_supervisor_array=[];
        $usuario_data=[
            'name' => request()->input('name'),
            'last_name' => request()->input('last_name'),
            'email' => request()->input('email'),
            'area' => request()->input('area'),            
            'cargo' => request()->input('cargo'),
            'perfil_cs' => request()->input('perfil_cs'),
            'perfil_aca' => request()->input('perfil_aca'),
            'rol_aca' => request()->input('rol_aca'),
            'perfil_cd' => request()->input('perfil_cd'),
        ];
        if($id==0){
            $usuario_data['password']=bcrypt('cencosud');
            $user = User::create($usuario_data);
            $id = $user->id;
        }else{
            $user=User::find($id);
            $user->update($usuario_data);
        }
        
        $user->roles()->sync($request->rol_cs);
        /* UsuarioCentroCompetencia::where('id_usuario',$id)->delete();
        UsuarioTienda::where('id_usuario',$id)->delete();
        UsuarioSeccion::where('id_usuario',$id)->delete();
        foreach ($cc as $key => $value) {
            $cc_array=['id_cc' => $value , 'id_usuario' => $id];
            UsuarioCentroCompetencia::create($cc_array);
        }
        foreach ($secciones_aca as $key => $value) {
            $secciones_aca_array=['codigo_seccion' => $value , 'id_usuario' => $id];
            UsuarioSeccion::create($secciones_aca_array);
        }
        foreach ($tiendas as $key => $value) {
            $tiendas_array=['id_tienda' => $value , 'id_usuario' => $id , 'tipo' => 'USUARIO'];
            UsuarioTienda::create($tiendas_array);
        }
        foreach ($tiendas_supervisor as $key => $value) {
            $tiendas_supervisor_array=['id_tienda' => $value , 'id_usuario' => $id , 'tipo' => 'SUPERVISOR'];
            UsuarioTienda::create($tiendas_supervisor_array);
        } */

        /*if(!empty($cc_array)){
            UsuarioCentroCompetencia::create($cc_array);
        }
        if(!empty($secciones_aca_array)){
            UsuarioSeccion::create($secciones_aca_array);
        }
        if(!empty($tiendas_array)){
            UsuarioTienda::create($tiendas_array);
        }
        if(!empty($tiendas_supervisor_array)){
            UsuarioTienda::create($tiendas_supervisor_array);
        }*/
        return redirect()->route('editUsuario', ['id' => $id])->with('notification_type', 'success')->with('notification_message', '¡Usuario guardado correctamente!');
    }
    public function usuario_edit($id)
    {
        $data=[];
        $data['usuario'] = User::with('roles')->findOrFail($id);        
        return view('usuarios.usuario-form',$data);
    }
}

