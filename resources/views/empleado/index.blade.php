@extends('layouts.app')
@section('content')
<div class="container">

   <!-- <div class="alert alert-success alert-dismissible">
    <i class="bi bi-info-square"></i> 
        @if(Session::has('mensaje'))
            {{ Session::get('mensaje') }}
        @endif
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>-->
    
    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
    
        {{ Session::get('mensaje') }}
   
    <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="alert"> 
    </button>
    </div>
    @endif
        

    <a href="{{ url('empleado/create') }}" class="btn btn-success">Nuevo</a>
    <br><br>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <td>#</td>
                <td>Foto</td>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Correo</td>
                <td>Acciones</td>
            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $empleado)
            <tr>
                <td>{{ $empleado->id }}</td>
                <td>
                    <img class="img-thumbnail img-fluid" width="100" src="data:image/jpg;base64,{{ chunk_split(base64_encode($empleado->foto)) }}">
                </td>
                <td>{{ $empleado->nombre }}</td>
                <td>{{ $empleado->apellido }}</td>
                <td>{{ $empleado->correo }}</td>
                <td>
                    <a class="btn btn-warning" href="{{ url('/empleado/'.$empleado->id.'/edit') }}">
                            Editar
                    </a>
                    <form class="d-inline" action="{{ url('/empleado/'.$empleado->id) }}" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input class="btn btn-danger" onclick="return confirm('Borrar?')" type="submit" value="Borrar">
                    </form>
                </td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $empleados->links() !!}
</div>
@endsection