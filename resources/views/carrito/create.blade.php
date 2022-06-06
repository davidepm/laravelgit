@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{ url('/carrito') }}" method = "post" enctype = "multipart/form-data">
    @csrf
    @include('carrito.form',['modo'=> 'Agregar al'])
</form>
</div>
@endsection