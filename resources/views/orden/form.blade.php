

<h1>Datos Orden</h1>

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
<label for="mediopago">Usuario:</label>
<input class="form-control" type="text" value="{{ $user }}"  name = "mediopago" id="mediopago" readonly>
</div>

<div class="form-group">
<label for="mediopago">Medio de Pago:</label>
<input class="form-control" type="text" value="Efectivo" name = "mediopago" id="mediopago" readonly>
</div>

<div class="form-group">
<label for="mediopago">Total:</label>
<input class="form-control" type="text" value="{{ $suma }}" name = "mediopago" id="mediopago" readonly>
</div>

<br>



<input class="btn btn-success" type="submit" value="Crear">

<a class="btn btn-primary" href="{{ url('carrito/') }}">Volver</a>


