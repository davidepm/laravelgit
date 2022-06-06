

<h1>{{ $modo }} Carrito</h1>

@if(count($errors) > 0)

    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-group">
<label for="nombre">Empleado:</label>
    <select class="form-control" name="seleccion1" id="seleccion1">
        <option selected>Escoger Empleado</option>
        @foreach($empleados as $empleado)
            <option value="{{ $empleado->id }}">{{ $empleado->nombre }}</option>
        @endforeach
    </select>
</div> 

<div class="form-group">
<label for="nombre">Producto:</label>
    <select class="form-control" name="seleccion" id="seleccion">
        <option selected>Escoger Producto</option>
        @foreach($productos as $producto)
            <option value="{{ $producto->id }}">{{ $producto->descripcion }}</option>
        @endforeach
    </select>
</div>


<div class="form-group">
<label for="nombre">Cantidad:</label>
<input class="form-control" type="text" name = "cantidad" id="producto">
</div>



<br>



<input class="btn btn-success" type="submit" value="Agregar al carrito">

<a class="btn btn-primary" href="{{ url('carrito/') }}">Volver</a>


    