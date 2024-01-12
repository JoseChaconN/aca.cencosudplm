<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ListadoDocumentos;
use Spatie\Tags\Tag;

class ListadoDocumentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:admin|administrador']);
    }
    public function index()
    {
        //
        $data['documentos'] = ListadoDocumentos::all();
        return view('listado-documentos.list-documentos', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data=[];
        $data['documento'] = new ListadoDocumentos();        
        $data['tags'] = Tag::all();
        $data['tags_documento']= [];
        return view('listado-documentos.documento-form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'tipo_documento' => 'required',
        ]);
        $certficacion= ListadoDocumentos::create([
            'nombre' => $request->input('nombre'),
            'tipo_documento' => $request->input('tipo_documento'),
            'mostrar_auditoria' => $request->input('mostrar_auditoria'),
            'mostrar_prospecto' => $request->input('mostrar_prospecto'),
            'file' => $request->input('file'),
        ]);
        if(!empty($request->tag)){
            $certficacion->syncTags($request->tag);
        }
        #$yourModel->syncTags(['tag 2', 'tag 3']);
        return redirect()->route('documentos.edit',$certficacion->id)->with('notification_type', 'success')->with('notification_message', '¡Certificación creada con exito!');
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
        $data['documento'] = ListadoDocumentos::with('tags')->find($id);
        $data['tags'] = Tag::all();
        $data['tags_documento']=[];
        $data['tags_documento']=[];
        foreach ($data['documento']->tags as $tag) {
            $data['tags_documento'][] = $tag->id;
            
        }
        return view('listado-documentos.documento-form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'tipo_documento' => 'required',
        ]);
        
        $certficacion = ListadoDocumentos::find($id);
        $certficacion->update([
            'nombre' => $request->input('nombre'),
            'tipo_documento' => $request->input('tipo_documento'),
            'mostrar_auditoria' => $request->input('mostrar_auditoria'),
            'mostrar_prospecto' => $request->input('mostrar_prospecto'),
            'file' => $request->input('file'),
        ]);
        if(!empty($request->tag)){
            $certficacion->syncTags($request->tag);
        }
        
        #$yourModel->syncTags(['tag 2', 'tag 3']);
        return redirect()->route('documentos.edit',$id)->with('notification_type', 'success')->with('notification_message', '¡Certificación guardada con exito!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $certficacion = ListadoDocumentos::find($id);
        $certficacion->delete();
        return redirect()->route('documentos.index')->with('notification_type', 'success')->with('notification_message', '¡Certificación eliminada con exito!');
    }
}
