@extends('layout')
@section('content')

<div class="row">
    <div class="col-sm-10"></div>
        <div class="col-sm-2">
        <a href="/product/form" class="btn btn-primary">Nuevo Producto</a>
        </div>

</div>

@if(Session::has('message'))
    <p class="alert alert-success">
        {{ Session::get('message') }}
    </p>
@endif

<table class="table table-striped table-hover">
    <head>
        <tr>
            <th>Name</th>
            <th>Cost</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Brand</th>
            <th></th>
        </tr>
    </head>
<tbody>
    @foreach($miListaDeProductos as $product)
        <tr>
        <td>{{ $product ->name }}</td>
        <td>{{ $product ->cost }}</td>
        <td>{{ $product ->price }}</td>
        <td>{{ $product ->quantity }}</td>
        <td>{{ $product ->brand->name }}</td>
        <td>
            <a href="{{ route('product.form',['id'=> $product->id]) }} " class="btn btn-warning">Editar</a>
            <a href="{{ route('product.delete',['id'=> $product->id]) }} " class="btn btn-danger">Borrar</a>
            
        </td>

    </tr>
    @endforeach
</tbody>
</table>
@endsection