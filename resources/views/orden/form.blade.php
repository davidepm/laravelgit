

<h1>{{ $modo }} Orden</h1>

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
<input class="form-control" type="text" value="{{ auth()->user()->name }}"  name = "mediopago" id="mediopago" readonly>
</div>

<div class="form-group">
<label for="mediopago">Medio de Pago:</label>
<input class="form-control" type="text" value="Efectivo" name = "mediopago" id="mediopago" readonly>
</div>

<div class="form-group">
<label for="mediopago">Total:</label>
<input class="form-control" type="text" value="" name = "mediopago" id="mediopago">
</div>

<br>



<input class="btn btn-success" type="submit" value="Agregar al carrito">

<a class="btn btn-primary" href="{{ url('orden/') }}">Volver</a>


