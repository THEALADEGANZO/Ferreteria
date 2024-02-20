@extends('layouts.app')

@section('title', '')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h2 class="mb-0">Ventas</h2>
        <a
            href="{{ route('venta.create') }}"
            class="btn btn-primary">
            Nueva Venta
        </a>
    </div>
    <hr/>
    <table class="table table-hover">
        <thead class="table-primary">
        <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Total</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($ventas as $venta)
            <tr class="producto-row">
                <td>{{$venta->id}}</td>
                <td>{{$venta->fecha }}</td>
                <td>{{$venta->cliente->nombre}}</td>
                <td>{{$venta->total}}</td>
                <td>
                    <a
                        href="{{route('venta.show',$venta->id)}}"
                        class="btn btn-primary">
                        Ver
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $ventas->links('components.paginator.index') }}
    </div>
@endsection
