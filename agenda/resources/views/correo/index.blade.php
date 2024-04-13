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
    <h2>Correos
        <a href="/" class='btn btn-danger float-end'>ATRAS</a>
    </h2>
</div>
<div class='card-body'>
<table class='table table-bordered table-sm'>
<thead>
    <tr>
        <th>ID</th>
        <th>Descripcion</th>
        <th>Correo</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </tr>
</thead>
<tbody>
    @foreach($datos as $dato)
    <tr>
        <td>{{$dato->id}}</td>
        <td>{{$dato->descripcion}}</td>
        <td>{{$dato->correo}}</td>
        <td><a href="{{ route('correo.edit', ['id' => $dato->id ]) }}" class='btn btn-info'>Editar</a>
        </td>
        <td>
            <form action="/correo/{{$dato->id}}" method='POST'>
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
    <a href="{{ route('correo.add', ['id' => $id ]) }}" class='btn btn-primary'>Agregar nuevo Correo</a>
</div>
</div>
</div>
</div>
</div>
</div>


@endsection('form')