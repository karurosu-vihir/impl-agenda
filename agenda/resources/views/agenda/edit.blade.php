@extends('layouts.main')

@section('form')
<div class='container'>
<div class='row'>
<div class='col-md-12'>
<div class='card'>
<div class='card-header'>
    <h4>Editar contacto
        <a href="/agenda" class='btn btn-danger float-end'>ATRAS</a>
    </h4>
</div>
<div class='card-body'>
<form action="/agenda/{{$registro->id}}" method="POST">
    @CSRF
    @method('PUT')
    <div class='form-group mb-3'>
    <label for="id">Codigo:</label>
    <input type="text" name='id' class='form-control' value='{{$registro->id}}' disabled>
    </div>
    <div class='form-group mb-3'>
    <label for="nombre">Nombre:</label>
    <input type="text" name='nombre' class='form-control' value='{{$registro->nombre}}'>
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