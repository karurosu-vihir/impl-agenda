<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Telefono;

class TelefonoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        //
        $datos = Telefono::where('codcliente', $id)->get();
        return view('telefono.index')->with('datos',$datos)->with('id',$id);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        //
        return view('telefono.create')->with('id',$id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $registro = new Telefono();

        $registro->codcliente=$request->get('idc');
        $registro->descripcion=$request->get('descripcion');
        $registro->telefono=$request->get('telefono');

        $registro->save();
        $id = $request->get('idc');
        return redirect()->route('telefono', ['id' => $id]);

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
        $registro = Telefono::find($id);
        return view("telefono.edit")->with('registro',$registro);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $registro = Telefono::find($id);

        $registro->descripcion=$request->get('descripcion');
        $registro->telefono=$request->get('telefono');
        $registro->save();
        return redirect()->route('telefono', ['id' => $registro->codcliente]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $registro=Telefono::find($id);
        $registro->delete();
        return redirect()->route('telefono', ['id' => $registro->codcliente]);
    }
}
