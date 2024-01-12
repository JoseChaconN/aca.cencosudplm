<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Spatie\Tags\Tag;

class TagsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['tags'] = Tag::all();
        return view('tags.list-tags', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data['tag'] = new Tag();
        return view('tags.tag-form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);
        $tag = Tag::create(['name' => $request->input('name')]);
        return redirect()->route('tags.index')->with('notification_type', 'success')->with('notification_message', '¡Etiqueta/Tag creada con exito!');
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
        $data['tag'] = Tag::find($id);
        return view('tags.tag-form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);
        $tag = Tag::find($id);
        $tag->update(['name' => $request->input('name')]);
        return redirect()->route('tags.index')->with('notification_type', 'success')->with('notification_message', '¡Etiqueta/Tag guardada con exito!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
