@extends('layouts.main')

@section('form')
<div class='container'>
<div class='row'>
<div class='col-md-12'>
<div class='card'>
<div class='card-header'>
    <h4>Crear Telefono
        <a href="/agenda" class='btn btn-danger float-end'>ATRAS</a>
    </h4>
</div>
<div class='card-body'>
<form action="/telefono" method="POST">
    @CSRF
    <div class='form-group mb-3'>
    <label for="idc">Codigo del contacto:</label>
    <input type="text" name='idc' class='form-control' value='{{$id}}' readonly>
    <div class='form-group mb-3'>
    <label for="descripcion">Descripcion:</label>
    <input type="text" name='descripcion' class='form-control'>
    </div>
    </div>
    <div class='form-group mb-3'>
    <label for="telefono">Telefono:</label>
    <input type="text" name='telefono' class='form-control'>
    </div>
    <div style='height:20px;'></div>
    <div class='text-center'>
        <button class='btn btn-primary' type='submit'>Subir</button>
    </div>
</form>
</div>
</div>
</div>
</div>
</div>
@endsection('form')