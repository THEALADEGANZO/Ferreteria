@extends('layouts.app')

@section('title', '')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h2 class="mb-0">Productos</h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
            Agregar Producto
        </button>
    </div>
    <hr />
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>Codigo</th>
                <th>Categoria</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Stock</th>
                <th>Precio Compra</th>
                <th>Precio Venta</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($producto as $prod)
                <tr class="producto-row">
                    <td scope="row">{{$prod->cod_productos}}</td>
                    <td>{{ $prod->categoria->nombre }}</td>
                    <td>{{$prod->nombre}}</td>
                    <td>{{$prod->descripcion}}</td>
                    <td>{{$prod->stock}}</td>
                    <td>{{$prod->precio_compra}}</td>
                    <td>{{$prod->precio_venta}}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update{{$prod->id}}">
                            Editar
                        </button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eliminar{{$prod->id}}">
                            Eliminar
                        </button>
                    </td>
                </tr>
                @include('producto.update')
                @include('producto.eliminar')
            @endforeach
        </tbody>
    </table>
    @include('producto.create')
@endsection
