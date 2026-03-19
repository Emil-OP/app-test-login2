@extends('layouts.app')
@section('title', 'Administrar Perfiles')
@section('content')
<div class="container">
    <h2>Listado de Perfiles</h2>
    {{-- @can('profile-create')
        <a class="btn btn-success btn-sm mb-2" href="{{ route('profiles.create') }}"><i class="fa fa-plus"></i> Crear Nuevo Perfil</a>
    @endcan --}}
    <table class="table table-bordered">
        <tr>
            <th>Cliente</th>
            <th>Teléfono</th>
            <th>Biografia</th>
            <th width="280px">Acción</th>
        </tr>
        @foreach ($profiles as $profile)
        <tr>
            <td>{{ $profile->client->nombre_cliente }}</td>
            <td>{{ $profile->phone }}</td>
            <td>{{ Str::limit($profile->biography, 50) }}</td>
            <td>
                @can('profile-show')
                <a class="btn btn-info" href="{{ route('profiles.show',$profile->client_id) }}">Ver</a>
                @endcan
                @can('profile-edit')
                <a class="btn btn-primary" href="{{ route('profiles.edit',$profile->client_id) }}">Editar</a>
                @endcan
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
