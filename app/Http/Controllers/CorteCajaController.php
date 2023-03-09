<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CorteCajaController extends Controller
{
    public function index() {
    $cortesDeCaja = CorteDeCaja::all();
    return view('cortes.index', ['cortesDeCaja' => $cortesDeCaja]);
    }

    public function store(Request $request) {
    $validatedData = $request->validate([
        'fecha' => 'required|date',
        'monto' => 'required|numeric',
        'descripcion' => 'required|string'
    ]);
    
    $corteDeCaja = new CorteDeCaja();
    $corteDeCaja->fecha = $validatedData['fecha'];
    $corteDeCaja->monto = $validatedData['monto'];
    $corteDeCaja->descripcion = $validatedData['descripcion'];
    $corteDeCaja->save();
    
    return redirect()->route('cortes.index')->with('success', 'El corte de caja ha sido registrado exitosamente.');
    }

    public function formularioCorteCaja() {
    return view('corte.corte-de-caja');
    }
}
