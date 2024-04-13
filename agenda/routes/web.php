<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\CorreoController;
use App\Http\Controllers\TelefonoController;

Route::get('/', function () {
    return redirect('/agenda');
});

Route::resource('/agenda','App\Http\Controllers\AgendaController');

Route::resource('/telefono','App\Http\Controllers\TelefonoController');
Route::get('/telefono/{id}/mostrar', 'App\Http\Controllers\TelefonoController@index')->name('telefono');
Route::get('/telefono/{id}/agregar', 'App\Http\Controllers\TelefonoController@create')->name('telefono.add');
Route::get('/telefono/{id}/editar', 'App\Http\Controllers\TelefonoController@edit')->name('telefono.edit');

Route::resource('/correo','App\Http\Controllers\CorreoController');
Route::get('/correo/{id}/mostrar', 'App\Http\Controllers\CorreoController@index')->name('correo');
Route::get('/correo/{id}/agregar', 'App\Http\Controllers\CorreoController@create')->name('correo.add');
Route::get('/correo/{id}/editar', 'App\Http\Controllers\CorreoController@edit')->name('correo.edit');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
