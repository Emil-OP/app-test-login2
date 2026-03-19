@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Productos</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success btn-sm mb-2" href="{{ route('products.create') }}">
                <i class="fa fa-plus"></i> Crear Nuevo Producto
            </a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th width="280px">Acciones</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->price }}</td>
        <td>
            <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                <a class="btn btn-info btn-sm" href="{{ route('products.show',$product->id) }}">
                    <i class="fa-solid fa-list"></i> Mostrar
                </a>
                <a class="btn btn-primary btn-sm" href="{{ route('products.edit',$product->id) }}">
                    <i class="fa-solid fa-pen-to-square"></i> Editar
                </a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('¿Seguro que deseas eliminar este producto?')">
                    <i class="fa-solid fa-trash"></i> Eliminar
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<p class="text-center text-primary"><small>Gestión de Productos</small></p>
@endsection
