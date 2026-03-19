@extends('layouts.app')
@section('title', 'Productos del Sistema')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Editar Producto</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary btn-sm mb-2" href="{{ route('products.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Error al editar el producto<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('products.update',$product->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                <input type="text" name="price" value="{{ $product->price}}" class="form-control" placeholder="Price">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre del Producto:</strong>
                <textarea class="form-control" style="height:150px" name="name" placeholder="Nombre del Producto">{{ $product->name }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <button type="submit" class="btn btn-primary btn-sm mb-2 mt-2"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
        </div>
    </div>
</form>

<p class="text-center text-primary"><small>Gestión de Productos</small></p>
@endsection
