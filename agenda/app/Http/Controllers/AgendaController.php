<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\Telefono;
use App\Models\Correo;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos = Agenda::All();
        return view('agenda.index')->with('datos',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('agenda.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $registro = new Agenda();

        $registro->nombre=$request->get('nombre');
        $registro->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $registro = Agenda::find($id);
        return view("agenda.edit")->with('registro',$registro);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $registro = Agenda::find($id);

        $registro->nombre=$request->get('nombre');
        $registro->save();
        return( redirect('/agenda'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $registro = Agenda::find($id);
        $telefono = Telefono::where('codcliente', $id)->get();
        $correo  = Correo::where('codcliente', $id)->get();
        $telefono->each->delete();
        $correo->each->delete();
        $registro->delete();
        return redirect('/agenda');
    }
}
