<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cliente;

class clienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cliente=cliente::all();
        return view('cliente.index', compact('cliente'));
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
        $cliente= new cliente();
        $cliente->cod_cliente='C' .str_pad(cliente::count()+1,5,'0',STR_PAD_LEFT);  
        $cliente->nombre = $request->input('nombre');
        $cliente->documento = $request->input('documento'); 
        $cliente->save();
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
        $cliente=cliente::find($id);
        $cliente->nombre = $request->input('nombre');
        $cliente->documento = $request->input('documento'); 
        $cliente->update();
        return redirect()->back()->with('info', 'guardado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente=cliente::find($id);
        $cliente->delete();
        return redirect()->back()->with('info', 'Eliminado Correctamente');
    }
}
