@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left"><h2>Gestión de Pedidos</h2></div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('orders.create') }}"> Crear Nuevo Pedido</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered mt-2">
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Producto</th>
            
            <th width="280px">Acción</th>
        </tr>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            
            <td>{{ $order->descripcion }}</td>
            <td>${{ number_format($order->monto, 2) }}</td>
            <td>
                <form action="{{ route('orders.destroy',$order->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('orders.show',$order->id) }}">Ver</a>
                    <a class="btn btn-primary" href="{{ route('orders.edit',$order->id) }}">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
