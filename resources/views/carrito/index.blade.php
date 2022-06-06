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


    <a href="{{ url('carrito/create') }}" class="btn btn-success">Agregar Nuevo</a>
    <br><br>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <td>ID</td>
                <td>Producto</td>
                <td>Precio</td>
                <td>Cantidad</td>
                <td>Total</td>
                <td>Accion</td>
            </tr>
        </thead>
        <tbody>
            @foreach($carritos as $carrito)
            <tr>
                <td>{{ $carrito->id }}</td>
                @foreach ($productos as $p)
                    @if($p->id == $carrito->producto_id)
                        <td>{{ $p->descripcion }}</td>
                        <td>{{ $p->precio }}</td>
                    @endif
                @endforeach
                <td>{{ $carrito->cantidad }}</td>
                <td>${{ $carrito->total }}</td>
                <td>
                    <form class="d-inline" action="{{ url('/carrito/'.$carrito->id) }}" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input class="btn btn-danger" onclick="return confirm('Borrar?')" type="submit" value="Borrar">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br></br>
    <h1>Datos Orden</h1>
<br></br>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <td>Usuario</td>
                <td>Medio de Pago</td>
                <td>Total</td>
                <td>Accion</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ auth()->user()->name }}</td>
                <td>Efectivo</td>
                <td>$</td>
                <td>
                    <a class="btn btn-success" href="">
                            Crear Orden
                    </a>
                </td>
            </tr>
        </tbody>

    </table>
    {!! $carritos->links() !!}
</div>
@endsection
