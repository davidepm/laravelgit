


<h1>{{ $modo }} empleado</h1>

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
<label for="nombre">Nombre:</label>
<input class="form-control" type="text" value="{{ isset($empleado->nombre)?$empleado->nombre:old('nombre')}}" name = "nombre" id="nombre">
</div> 
<div class="form-group">   
<label for="apellido">Apellido:</label>
    <input class="form-control" type="text" value="{{ isset($empleado->apellido)?$empleado->apellido:old('apellido') }}" name= "apellido" id="apellido">
    </div> 
    <div class="form-group">
    <label for="correo">Correo:</label>
    <input class="form-control" type="text" value="{{ isset($empleado->correo)?$empleado->correo:old('correo') }}" name="correo" id="correo">
    </div>  
    <div class="form-group">
    @isset($empleado->foto)
    <img class="img-thumbnail img-fluid" src="data:image/jpg;base64,{{ chunk_split(base64_encode($empleado->foto)) }}" width="100"  alt="foto">
    @endif
    <input class="form-control" type="file" name="foto" id="foto">
</div>
<br>
    <input class="btn btn-success" type="submit" value="{{ $modo }} datos">

    <a class="btn btn-primary" href="{{ url('empleado/') }}">Volver</a>


    