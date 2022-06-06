@extends('layouts.app')
@section('content')
<div class="container">

    
@if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
    
        {{ Session::get('mensaje') }}
   
    <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="alert"> 
    </button>
    </div>
    @endif
        
    <br><br>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <td>#</td>
                <td>Empleado</td>
                <td>Producto</td>
                <td>Cantidad</td>
                <td>Precio</td>
                <td>Total</td>
            </tr>
        </thead>
        <tbody>
            @foreach($ordenes as $orden)
            <tr>
                <td>{{ $orden->id }}</td>
                @foreach($empleados as $empleado)
                    @if($orden->customer_id == $empleado->id)
                    <td>{{ $empleado->nombre }}</td>
                    @endif
                @endforeach
                <td>{{ $orden->producto }}</td>
                <td>{{ $orden->cantidad }}</td>
                <td>{{ $orden->precio }}</td>
                <td>{{ $orden->total }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $ordenes->links() !!}
</div>
@endsection