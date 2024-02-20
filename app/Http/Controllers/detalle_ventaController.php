<?php

namespace App\Http\Controllers;

use App\Models\detalle_venta;
use Illuminate\Http\Request;

class detalle_ventaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $detalle_venta= new detalle_venta();        
        $detalle_venta->idventas = $request->input('idventas');
        $detalle_venta->idproductos = $request->input('idproductos');
        $detalle_venta->cantidad = $request->input('cantidad');
        $detalle_venta->save();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
