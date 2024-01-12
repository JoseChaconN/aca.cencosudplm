<?php

namespace App\Http\Controllers;

use App\Models\Tienda;
use App\Models\Seccion;
use App\Models\User;
use App\Models\CentroCompetencia;
use App\Models\SolicitudProspectoProductosAca;
use App\Models\UsuarioCentroCompetencia;
use App\Models\UsuarioTienda;
use App\Models\UsuarioSeccion;
use App\Models\Auditoria;
use App\Models\VisitaInspectiva;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Tags\Tag;

class HomeController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        #$tagA = Tag::findOrCreate('tagA');
        #dd($tagA);
        $data['breadcrumb'] = 'Inicio';
        $ano = date('Y');
        $mes = date('m');
        $id_user = Auth::user()->id;
        $data['data_dashboard'] = $this->data_dashboard($ano,$mes,$id_user);
        return view('dashboard.index',$data);
    }

    public function data_dashboard($ano,$mes,$id_user)
    {
        $usuario = User::find($id_user);
        $secciones_usuario = UsuarioSeccion::where('id_usuario', $id_user)->get();        
        foreach ($secciones_usuario as $item) {
            $id_secciones[]=$item->codigo_seccion;
        }

        #Prospectos
        if($usuario->hasRole('comercial')){ 
            $data['resumen_mis_prospectos_proceso']=$usuario->prospecto_comercial()->where('created_at','LIKE','%'.$ano.'-'.$mes.'%')->where('status',1)->count();
            $data['resumen_mis_prospectos_cerradas']=$usuario->prospecto_comercial()->where('created_at','LIKE','%'.$ano.'-'.$mes.'%')->where('status',2)->count();
            $data['resumen_mis_prospectos_secciones_proceso'] = SolicitudProspectoProductosAca::where('id_comercial',$id_user)->where('created_at','LIKE','%'.$ano.'-'.$mes.'%')->where('status',1)->count();
            $data['resumen_mis_prospectos_secciones_cerradas'] = SolicitudProspectoProductosAca::where('id_comercial',$id_user)->where('created_at','LIKE','%'.$ano.'-'.$mes.'%')->where('status',2)->count();
        }
        if($usuario->hasRole('calidad')){
            $data['resumen_mis_prospectos_proceso']=$usuario->prospecto_calidad()->where('created_at','LIKE','%'.$ano.'-'.$mes.'%')->where('status',1)->count();
            $data['resumen_mis_prospectos_cerradas']=$usuario->prospecto_calidad()->where('created_at','LIKE','%'.$ano.'-'.$mes.'%')->where('status',2)->count();
            $data['resumen_mis_prospectos_secciones_proceso'] = SolicitudProspectoProductosAca::where('id_calidad',$id_user)->where('created_at','LIKE','%'.$ano.'-'.$mes.'%')->where('status',1)->count();
            $data['resumen_mis_prospectos_secciones_cerradas'] = SolicitudProspectoProductosAca::where('id_calidad',$id_user)->where('created_at','LIKE','%'.$ano.'-'.$mes.'%')->where('status',2)->count();
        }
        #AUDITORIAS
        $data['resumen_mis_auditorias_proceso']=$usuario->auditoria()->where('fecha_auditoria','LIKE','%'.$ano.'-'.$mes.'%')->where('status',1)->count();
        $data['resumen_mis_auditorias_cerradas']=$usuario->auditoria()->where('fecha_auditoria','LIKE','%'.$ano.'-'.$mes.'%')->where('status',2)->count();
        $data['resumen_total_auditorias_proceso']=Auditoria::where('fecha_auditoria','LIKE','%'.$ano.'-'.$mes.'%')->where('status',1)->count();        
        $data['resumen_total_auditorias_cerradas']=Auditoria::where('fecha_auditoria','LIKE','%'.$ano.'-'.$mes.'%')->where('status',2)->count();
        

        #VISITAS INSPECTIVAS
        $data['resumen_mis_visitas_inespectivas_proceso']=$usuario->visita_inspectiva()->where('fecha_visita','LIKE','%'.$ano.'-'.$mes.'%')->where('status',1)->count();
        $data['resumen_mis_visitas_inespectivas_cerradas']=$usuario->visita_inspectiva()->where('fecha_visita','LIKE','%'.$ano.'-'.$mes.'%')->where('status',2)->count();
        $data['resumen_total_visitas_inespectivas_proceso']=VisitaInspectiva::where('fecha_visita','LIKE','%'.$ano.'-'.$mes.'%')->where('status',1)->count();
        $data['resumen_total_visitas_inespectivas_cerradas']=VisitaInspectiva::where('fecha_visita','LIKE','%'.$ano.'-'.$mes.'%')->where('status',2)->count();
        /*$data['resumen_mis_prospectos_proceso']=$usuario->reclamos()->where('fecha_local','LIKE','%'.$ano.'-'.$mes.'%')->where('status','PROCESO')->count();
        $data['resumen_mis_prospectos_cerrados']=$usuario->reclamos()->where('fecha_local','LIKE','%'.$ano.'-'.$mes.'%')->where('status','CERRADO')->count();
        $data['resumen_mis_secciones_reclamos_proceso'] = Reclamo::whereIn('id_local', $id_local)->where('fecha_local','LIKE','%'.$ano.'-'.$mes.'%')->where('status','PROCESO')->count();
        $data['resumen_mis_secciones_reclamos_cerrados'] = Reclamo::whereIn('id_local', $id_local)->where('fecha_local','LIKE','%'.$ano.'-'.$mes.'%')->where('status','CERRADO')->count();

        #RECALLS
        $data['resumen_mis_recall_proceso']=$usuario->recall()->where('momento_ingreso','LIKE','%'.$ano.'-'.$mes.'%')->where('status','PROCESO')->count();
        $data['resumen_mis_recall_cerrados']=$usuario->recall()->where('momento_ingreso','LIKE','%'.$ano.'-'.$mes.'%')->where('status','CERRADO')->count();
        $data['resumen_mis_respuestas_recall'] = $usuario->respuesta_recall()->where('created_at','LIKE','%'.$ano.'-'.$mes.'%')->count();
        $data['resumen_mis_tiendas_respuestas_recall'] = RecallRespuesta::whereIn('id_local', $id_local)->where('created_at','LIKE','%'.$ano.'-'.$mes.'%')->count();

        #RECHAZOS
        $data['resumen_mis_rechazo_proceso']=$usuario->rechazos()->where('fecha_inicio','LIKE','%'.$ano.'-'.$mes.'%')->where('status','PROCESO')->count();
        $data['resumen_mis_rechazo_cerrados']=$usuario->rechazos()->where('fecha_inicio','LIKE','%'.$ano.'-'.$mes.'%')->where('status','CERRADO')->count();
        $data['resumen_mis_tiendas_rechazo_proceso'] = $data['resumen_mis_rechazo_proceso'];#Rechazo::whereIn('id_local', $id_local)->where('fecha_inicio','LIKE','%'.$ano.'-'.$mes.'%')->where('status','PROCESO')->count();
        $data['resumen_mis_tiendas_rechazo_cerrados'] =  $data['resumen_mis_rechazo_cerrados'];#Rechazo::whereIn('id_local', $id_local)->where('fecha_cerrado','LIKE','%'.$ano.'-'.$mes.'%')->where('status','CERRADO')->count();

        #ALERTAS RECLAMOS
        $data['resumen_alerta'] = Reclamo::whereIn('id_seccion', $secciones_ccs_usuario)->where('fecha_local','LIKE','%'.$ano.'-'.$mes.'%')->where('posible_recall','si')->where('status','PROCESO')->count();
        $data['alerta_reclamos'] = Reclamo::whereIn('id_seccion', $secciones_ccs_usuario)->where('fecha_local','LIKE','%'.$ano.'-'.$mes.'%')->where('posible_recall','si')->where('status','PROCESO')->get();

        #Reclamos SAC
        $data['reclamos_sac']=$usuario->reclamos()->where('caso_atento','si')->where('fecha_local','LIKE','%'.$ano.'-'.$mes.'%')->where('status','PROCESO')->get();
        #dd($data['reclamos_sac']);


        #Grafico
        $meses_array = ['01' => 'Enero', '02' => 'Febrero', '03' => 'Marzo', '04' => 'Abril', '05' => 'Mayo', '06' => 'Junio', '07' => 'Julio', '08' => 'Agosto', '09' => 'Septiembre', '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre'];
        foreach ($meses_array as $key => $value) {
            $data['resumen_grafico_reclamos'][]=Reclamo::where('fecha_local','LIKE','%'.$ano.'-'.$key.'%')->count();
            $data['resumen_grafico_reclamos_sac'][]=Reclamo::where('fecha_local','LIKE','%'.$ano.'-'.$key.'%')->where('caso_atento','si')->count();
            $data['resumen_grafico_recall'][]=Recall::where('momento_ingreso','LIKE','%'.$ano.'-'.$key.'%')->count();
            $data['resumen_grafico_rechazos'][]=Rechazo::where('fecha_inicio','LIKE','%'.$ano.'-'.$key.'%')->count();
        }*/
        return $data;
    }
    public function set_tienda_usuario(Request $request)
    {
        $tienda = Tienda::find($request->input('tienda'));
        $request->session()->forget('u_id_tienda');
        $request->session()->forget('u_codigo_tienda');
        $request->session()->forget('u_nombre_tienda');
        session(['u_id_tienda' => $request->input('tienda')]);
        session(['u_codigo_tienda' => $tienda->codigo]);
        session(['u_nombre_tienda' => $tienda->nombre]);
        session(['u_area_tienda' => $tienda->area]);
        session(['u_categoria_tienda' => $tienda->categoria]);
        session(['u_zona_tienda' => $tienda->zona]);
        #print_r(session()->all());
        #session('u_id_tienda',$request->input('tienda'));
        return redirect()->intended();
        #return redirect()->route('home');
    }
}
    