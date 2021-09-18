@extends('layout')
@section('content')
<a href="{{ route('invoice.form') }}" class="btn btn-primary">Nueva Factura</a>
<table class="table table-stripped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Subtotal</th>
            <th>Total</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($invoices as $invoice)
        <tr>
            <td>{{ $invoice->id }}</td>
            <td>{{ $invoice->created_at }}</td>
            <td>$ {{ number_format($invoice->subtotal,0,",",",") }}</td>
            <td>$ {{ number_format($invoice->total,0,",",",") }}</td>
            <td>
            <button type="button" class="btn btn-primary" data-bs-toggle='modal' data-bs-target='#modal{{ $invoice->id }}'>
                        Detalle
                    </button>
            </td>
            <div class="modal fade" id="modal{{ $invoice->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                 <div class="modal-content">
                    <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLabel">Invoice # {{ $invoice->id }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                   </div>
                   <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-3"><b>Producto</b></div>
                        <div class="col-sm-3"><b>Cantidad</b></div>
                        <div class="col-sm-3"><b>Precio</b></div>
                        <div class="col-sm-3"><b>Total</b></div>
                        @foreach($invoice->products as $product)
                        <div class="row">
                        <div class="col-sm-3">{{ $product->name  }}</div>
                        <div class="col-sm-3">{{ $product->pivot->quantity  }}</div>
                        <div class="col-sm-3">$ {{ number_format($product->pivot->price,0,",",",")  }}</div>
                        <div class="col-sm-3">$ {{ number_format($product->pivot->price * $product->pivot->quantity,0,",",",") }}</div>
                        </div>
                        @endforeach
                   </div>
                   <hr>
                   <div class="row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-3">Subtotal:</div>
                        <div class="col-sm-3">$ {{ $invoice->subtotal }}</div>
                   </div>
                   <div class="row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-3">IVA:</div>
                        <div class="col-sm-3">$ {{ $invoice->total - $invoice->subtotal }}</div>
                   </div>
                   <div class="row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-3">Total:</div>
                        <div class="col-sm-3">$ {{ $invoice->total }}</div>
                   </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     </div>
                  </div>
              </div>
            </div>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection