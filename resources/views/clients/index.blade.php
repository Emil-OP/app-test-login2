@extends('layouts.app')
@section('title', 'Administrar Clientes')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Clientes</h2>
        </div>
        <div class="pull-right">
            @can('client-create')
            <a class="btn btn-success btn-sm mb-2" href="{{ route('clients.create') }}"><i class="fa fa-plus"></i> Crear Nuevo Cliente</a>
            @endcan
        </div>
    </div>
</div>

@session('success')
    <div class="alert alert-success" role="alert">
        {{ $value }}
    </div>
@endsession

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Cedula</th>
        <th>Nombre Cliente</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($clients as $client)
    <tr>
        <td>{{ ($clients->currentPage() - 1) * $clients->perPage() + $loop->iteration }}</td>
        <td>{{ $client->cedula }}</td>
        <td>{{ $client->nombre_cliente }}</td>
        <td>
            <form action="{{ route('clients.destroy',$client->id) }}" method="POST">
                <a class="btn btn-info btn-sm" href="{{ route('clients.show',$client->id) }}"><i class="fa-solid fa-list"></i> Mostrar</a>
                @can('client-edit')
                <a class="btn btn-primary btn-sm" href="{{ route('clients.edit',$client->id) }}"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                @endcan

                @csrf
                @method('DELETE')

                @can('client-delete')
                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Eliminar</button>
                @endcan
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $clients->links() !!}

<p class="text-center text-primary"><small>Gestión de Clientes</small></p>
@endsection
