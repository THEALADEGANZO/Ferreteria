@extends('layouts.app')

@section('title', '')

@section('contents')
    <div class="row">
        <div class="col-md-6">
            <h2 class="mb-0" style="display: inline-block;">Mostrando Venta</h2>
        </div>
        <div class="col-md-6 text-right">
        </div>
    </div>
    <form method="POST" action="{{ route('venta.store') }}" id="formVenta">
        @csrf
        <div class="row">
            <div class="col-md-12 border-right">
                <div class="row" id="res"></div>
                <div class="row mt-2">
                    <div class="col-md-1" STYLE="display: none">
                        <label class="labels">ID_CLIENTE</label>
                        <input type="text" id="idcliente" name="idcliente" class="form-control" readonly>
                    </div>
                    <div class="col-md-9">
                        <label class="labels">CLIENTE</label>
                        <input
                            value="{{$venta->cliente->nombre}}"
                            type="text" id="cliente" name="cliente" class="form-control"
                            placeholder="Buscar Cliente" readonly>
                        <ul id="resultadoscliente" class="list-group" style="display: none;"></ul>
                    </div>
                    <div class="col-md-3">
                        <label class="labels">DOCUMENTO</label>
                        <input
                            value="{{$venta->cliente->documento}}"
                            type="text" id="documento" name="documento" class="form-control" readonly>
                    </div>
                </div>
            </div>
        </div>
    </form> <!-- Fin del formulario principal -->
    <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
    </div>
    <div class="form-group col-lg-12 col-md-12 col-xs-12">
        <table id="detallesVentaTemporal" class="table table-striped table-bordered table-condensed table-hover">
            <thead style="background-color:#A9D0F5">
            <th>Codigo</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Venta</th>
            <th>Total</th>
            </thead>
            <tbody>
            @foreach($venta->detallesVenta as $item)
                <tr>
                    <td>{{$item->producto->id}}</td>
                    <td>{{$item->producto->nombre }}</td>
                    <td>{{$item->cantidad }}</td>
                    <td>{{number_format($item->producto->precio_venta,2)}}</td>
                    <td>{{number_format($item->cantidad * $item->producto->precio_venta,2)}}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <td colspan="4" class="text-right"><strong>Subtotal:</strong></td>
                <td id="total" class="text-center">{{number_format($venta->subtotal,2)}}</td>
            </tr><tr>
                <td colspan="4" class="text-right"><strong>IGV:</strong></td>
                <td id="total" class="text-center">{{number_format($venta->igv,2)}}</td>
            </tr>
            <tr>
                <td colspan="4" class="text-right"><strong>Monto Total:</strong></td>
                <td id="total" class="text-center">{{number_format($venta->total,2)}}</td>
            </tr>
            </tfoot>
        </table>
        <form method="POST" action="">
            @csrf
            <div class="form-group col-md-3 m-auto">
                <a
                    href="{{ route('venta.export',$venta->id) }}"
                    target="_blank"
                    class="btn btn-primary btn-block text-white" type="submit" id="btnEmitirComprobante">
                    <i class="fa fa-plus"></i> Imprimir
                </a>
            </div>
        </form>
        <br>
        <div class="form-group col-md-3 m-auto">
            <a href="{{ route('venta.index') }}"
               class="btn btn-secondary btn-block text-white">
                Cancelar
            </a>
        </div>
    </div>

@endsection
