@extends('layouts.app')

@section('title', '')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h2 class="mb-0">Clientes</h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
            Agregar Clientes
        </button>
    </div>
    <hr />
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Documento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cliente as $cli)
            <tr class="cliente-row">
                <td scope="row">{{$cli->cod_cliente}}</td>
                <td>{{$cli->nombre}}</td>
                <td>{{$cli->documento}}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update{{$cli->id}}">
                        Editar
                    </button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eliminar{{$cli->id}}">
                        Eliminar
                    </button>
                </td>
            </tr>
            @include('cliente.update')
            @include('cliente.eliminar')
            @endforeach
        </tbody>
    </table>
  

    @include('cliente.create')
@endsection