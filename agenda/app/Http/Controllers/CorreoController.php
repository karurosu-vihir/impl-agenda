<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Correo;

class CorreoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        //
        $datos = Correo::where('codcliente', $id)->get();
        return view('correo.index')->with('datos',$datos)->with('id',$id);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        //
        return view('correo.create')->with('id',$id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $registro = new Correo();

        $registro->codcliente=$request->get('idc');
        $registro->descripcion=$request->get('descripcion');
        $registro->correo=$request->get('correo');

        $registro->save();
        $id = $request->get('idc');
        return redirect()->route('correo', ['id' => $id]);

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
        $registro = Correo::find($id);
        return view("correo.edit")->with('registro',$registro);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $registro = Correo::find($id);

        $registro->descripcion=$request->get('descripcion');
        $registro->correo=$request->get('correo');
        $registro->save();
        return redirect()->route('correo', ['id' => $registro->codcliente]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $registro=Correo::find($id);
        $registro->delete();
        return redirect()->route('correo', ['id' => $registro->codcliente]);
    }
}
