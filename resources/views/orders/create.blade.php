@extends('layouts.app')
@section('title', 'Gestión de Pedidos')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Crear Nuevo Pedido</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary btn-sm mb-2" href="{{ route('orders.index') }}">
                    <i class="fa fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Vaya!</strong> Revisa los campos obligatorios.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        
        <div class="form-group mb-3">
            <strong>Seleccionar Cliente:</strong>
            <select name="client_id" class="form-control">
                <option value="">-- Seleccione un Cliente --</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->nombre_cliente }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <strong>Seleccionar Producto:</strong>
            <select name="product_id" class="form-control">
                <option value="">-- Seleccione un Producto --</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }} (${{ $product->price }})</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <strong>Cantidad:</strong>
            <input type="number" name="quantity" class="form-control" value="1" min="1">
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fa-solid fa-floppy-disk"></i> Guardar Pedido
        </button>
    </form>
</div>
@endsection