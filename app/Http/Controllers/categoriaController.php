<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use Illuminate\Http\Request;

class categoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoria = categoria::orderBy('created_at', 'ASC')->get();
        return view('categoria.index', compact('categoria'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categoria= new categoria();
        $categoria->cod_categoria ='C' .str_pad(categoria::count()+1,3,'0',STR_PAD_LEFT);
        $categoria->nombre = $request->input('nombre');
        $categoria->save();
        return redirect()->back()->with('info', 'guardado Correctamente');
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
        $categoria=categoria::find($id);
        $categoria->nombre = $request->input('nombre');   
        $categoria->update();
        return redirect()->back()->with('info', 'guardado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria=categoria::find($id);
        $categoria->delete();
        return redirect()->back()->with('info', 'Eliminado Correctamente');
    }
}
