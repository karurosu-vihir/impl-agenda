<head>
    <style>
        .btn-primary, .btn-primary:hover, .btn-primary:active, .btn-primary:visited {
            background-color: #1ee80c !important;
            margin-top: 30px;
        }
        
        td, th{
            text-align: center;
        }
    </style>
</head>

@extends('layouts.main')

@section('form')
<div class='container'>
<div class='row'>
<div class='col-md-12'>
<div class='card'>
<div class='card-header'>
    <h2>Bienvenido</h2>
</div>
<div class='card-body'>
<table class='table table-bordered table-sm'>
<thead>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Telefono</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </tr>
</thead>
<tbody>
    @foreach($datos as $dato)
    <tr>
        <td>{{$dato->id}}</td>
        <td>{{$dato->nombre}}</td>
        <td><a href="{{ route('correo', ['id' => $dato->id ]) }}" class='btn btn-info'>Correos</a></td>
        <td><a href="{{ route('telefono', ['id' => $dato->id ]) }}" class='btn btn-info'>Telefonos</a></td>
        <td><a href="/agenda/{{$dato->id}}/edit" class='btn btn-info'>Editar</a></td>
        <td>
            <form action="/agenda/{{$dato->id}}" method='POST'>
                @csrf
                @method('Delete')
                <button type='submit' class='btn btn-warning'>Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
<div class='text-center'>
    <a href='/agenda/create' class='btn btn-primary'>Crear nuevo Contacto</a>
</div>
</div>
</div>
</div>
</div>
</div>


@endsection('form')