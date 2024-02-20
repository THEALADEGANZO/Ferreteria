@extends('layouts.app')

@section('title', '')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h2 class="mb-0">Proveedor</h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
            Agregar Proveedor
        </button>
    </div>
    <hr />
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Documento</th>           
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proveedor as $prov)
            <tr class="proveedor-row">
                <td scope="row">{{$prov->cod_proveedor}}</td>
                <td>{{$prov->nombre}}</td>
                <td>{{$prov->telefono}}</td>
                <td>{{$prov->documento}}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update{{$prov->id}}">
                        Editar
                    </button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eliminar{{$prov->id}}">
                        Eliminar
                    </button>
                </td>
            </tr>
            @include('proveedor.update')
            @include('proveedor.eliminar')
        @endforeach
        </tbody>
    </table>
    @include('proveedor.create')
@endsection
