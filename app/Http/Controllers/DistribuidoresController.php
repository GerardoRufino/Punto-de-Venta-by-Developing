<?php

namespace App\Http\Controllers;

use App\Distribuidor;
use Illuminate\Http\Request;

class DistribuidoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("distribuidores.distribuidores_index", ["distribuidores" => Distribuidor::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $distribuidor = Distribuidor::find($id);
        return view("distribuidores.distribuidores_edit", ["distribuidor" => $distribuidor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $distribuidor = Distribuidor::find($id);

        $distribuidor->update([
            'nombre' => $request->get('nombre'),
            'telefono' => $request->get('telefono'),
            'direccion' => $request->get('direccion'),
            'ciudad' => $request->get('ciudad'),
        ]);

        return redirect()->route("distribuidores.index")->with("mensaje", "Distribuidor actualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $distribuidor = Distribuidor::find($id);
        $distribuidor->delete();
        return redirect()->route("distribuidores.index")->with("mensaje", "Distribuidor eliminado");
    }
}
