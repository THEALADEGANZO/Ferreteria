<?php

namespace App\Http\Controllers;

use App\Models\proveedor;
use Illuminate\Http\Request;

class proveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedor=proveedor::all();
        return view('proveedor.index', compact('proveedor'));
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
        $proveedor= new proveedor();
        $proveedor->cod_proveedor ='PR' .str_pad(proveedor::count()+1,5,'0',STR_PAD_LEFT);  
        $proveedor->nombre = $request->input('nombre');
        $proveedor->telefono = $request->input('telefono');
        $proveedor->documento = $request->input('documento');    
        $proveedor->save();
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
        $proveedor=proveedor::find($id);
        $proveedor->nombre = $request->input('nombre');
        $proveedor->telefono = $request->input('telefono');
        $proveedor->documento = $request->input('documento');    
        $proveedor->update();
        return redirect()->back()->with('info', 'guardado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proveedor=proveedor::find($id);
        $proveedor->delete();
        return redirect()->back()->with('info', 'Eliminado Correctamente');
    }
}
