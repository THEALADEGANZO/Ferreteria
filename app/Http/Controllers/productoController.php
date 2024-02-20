<?php

namespace App\Http\Controllers;

use App\Models\producto;
use Illuminate\Http\Request;
use App\Models\categoria;

class productoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $producto=producto::all();
        $categoria=categoria::all();
        return view('producto.index', compact('producto','categoria'));
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
        $producto= new producto();
        $producto->cod_productos ='P' .str_pad(producto::count()+1,5,'0',STR_PAD_LEFT);  
        $producto->idcategoria = $request->input('idcategoria');
        $producto->nombre = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->stock = $request->input('stock');
        $producto->precio_compra = $request->input('precio_compra');
        $producto->precio_venta = $request->input('precio_venta');
        $producto->save();
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
        $producto=producto::find($id);
        $producto->idcategoria = $request->input('idcategoria');
        $producto->nombre = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->stock = $request->input('stock');
        $producto->precio_compra = $request->input('precio_compra');
        $producto->precio_venta = $request->input('precio_venta');
        $producto->update();
        return redirect()->back()->with('info', 'guardado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto=producto::find($id);
        $producto->delete();
        return redirect()->back()->with('info', 'Eliminado Correctamente');
    }
}
