@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Listado de Perfiles</h2>
    <table class="table table-bordered">
        <tr>
            <th>Cliente</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th width="280px">Acción</th>
        </tr>
        @foreach ($profiles as $profile)
        <tr>
            <td>{{ $profile->client->nombre_cliente }}</td>
            <td>{{ $profile->telefono }}</td>
            <td>{{ $profile->direccion }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('profiles.show',$profile->id) }}">Ver</a>
                <a class="btn btn-primary" href="{{ route('profiles.edit',$profile->id) }}">Editar</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
