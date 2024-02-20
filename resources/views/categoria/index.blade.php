@extends('layouts.app')

@section('title', '')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h2 class="mb-0">Categorias</h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
            Agregar Categoria
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
            @foreach($categoria as $cat)
            <tr class="categoria-row">
                <td scope="row">{{$cat->cod_categoria}}</td>
                <td>{{$cat->nombre}}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update{{$cat->id}}">
                        Editar
                    </button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eliminar{{$cat->id}}">
                        Eliminar
                    </button>
                </td>
            </tr>
            @include('categoria.update')
            @include('categoria.eliminar')
            @endforeach
        </tbody>
    </table>
  

    @include('categoria.create')
@endsection