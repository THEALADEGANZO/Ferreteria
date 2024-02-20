<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\producto;
use App\Models\cliente;
use App\Models\detalle_venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class ventaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = Venta::orderBy('id', 'desc')->paginate(10); // Cambia 10 al número de elementos por página que desees
        return view('venta.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productos = producto::all();
        $cliente = cliente::all();
        return view('venta.create', compact('productos', 'cliente'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // Obtener datos del formulario
        $id_cliente = $request->input('idCliente');
        $detalle = $request->input('detallesVenta');
        $subtotal = ($request->input('subtotal'));
        $igv = ($request->input('igv'));
        $total = ($request->input('total'));

        // Iniciar la transacción
        DB::beginTransaction();

        try {
            // Crear la venta
            $venta = new Venta();
            $venta->id_cliente = $id_cliente;
            $venta->fecha = now();  // Puedes ajustar la fecha según tus necesidades
            $venta->subtotal = $subtotal;
            $venta->igv = $igv;
            $venta->total = $total;
            $venta->save();

            // Obtener el ID de la venta recién creada
            $id_venta = $venta->id;
            // Insertar los detalles de la venta
            foreach ($detalle as $item) {
                $id_producto = intval($item['id']);
                $cantidad_vendida = intval($item['cantidad']);
                // Obtener el producto y restar la cantidad vendida al stock
                $producto = Producto::find($id_producto);
                $producto->stock -= $cantidad_vendida;
                $producto->save();

                $detalleVenta = new detalle_venta();
                $detalleVenta->id_venta = $id_venta;
                $detalleVenta->id_producto = $id_producto;  // Ajusta el nombre según tu formulario
                $detalleVenta->cantidad = $cantidad_vendida;
                $detalleVenta->save();
            }

            // Confirmar la transacción
            DB::commit();

            return response()->json(['success' => true, 'message' => 'Venta realizada con éxito', 'venta_id' => $id_venta]);
        } catch (\Exception $e) {
            // Deshacer la transacción en caso de error
            DB::rollBack();

            return response()->json(['success' => false, 'message' => 'Error al realizar la venta', 'error' => $e->getMessage()]);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Venta $venta)
    {
        $venta->load('cliente', 'detallesVenta');
        return view('venta.show', compact('venta'));
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

    public function export(string $id)
    {
        $venta = Venta::with('cliente', 'detallesVenta')->find($id);
        $pdf = pdf::loadView('venta.export', ['venta' => $venta]);
        return $pdf->stream('boleta_de_venta.pdf');
    }
}
