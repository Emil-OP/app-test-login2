@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Crear Nuevo Pedido</h2>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <strong>Seleccionar Cliente:</strong>
            <select name="client_id" class="form-control">
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->nombre_cliente }} ({{ $client->cedula }})</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <strong>Descripción del Producto:</strong>
            <input type="text" name="descripcion" class="form-control" placeholder="Ej: Laptop Dell">
        </div>
        <div class="form-group">
            <strong>Monto:</strong>
            <input type="number" step="0.01" name="monto" class="form-control" placeholder="0.00">
        </div>
        <button type="submit" class="btn btn-success mt-2">Guardar Pedido</button>
    </form>
</div>
@endsection
