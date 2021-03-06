@extends('layouts.app')
@section('content')
<div class="container row mx-auto">


@if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">

        {{ Session::get('mensaje') }}

    <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="alert">
    </button>
    </div>
@endif
@if(Session::has('mensaje2'))
    <div class="alert alert-danger alert-dismissible" role="alert">

        {{ Session::get('mensaje2') }}

    <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="alert">
    </button>
    </div>
@endif


<div>
    <a href="{{ url('carrito/create') }}" class="btn btn-success">Agregar Nuevo</a>
</div>

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
<div class="btn-group mb-3 col-12 flex justify-content-end">
    <div class="col-4 d-flex justify-content-end">
        <a type="button" class="btn btn-primary" aria-label="Input group example" href="{{ url('orden/create') }}">Crear</a>
    </div>
</div>

    {!! $carritos->links() !!}
</div>
@endsection
