@extends('layouts.app')
@section('title', 'Administrar Perfiles')
@section('content')
<div class="container">
    <h2>Editar Perfil de: {{ $profile->client->nombre_cliente }}</h2>
    <form action="{{ route('profiles.update', $profile->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <strong>Teléfono:</strong>
            <input type="text" name="telefono" value="{{ $profile->telefono }}" class="form-control">
        </div>
        <div class="form-group">
            <strong>Dirección:</strong>
            <textarea name="direccion" class="form-control">{{ $profile->direccion }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
    </form>
</div>
@endsection
