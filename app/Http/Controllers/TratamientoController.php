<?php

namespace App\Http\Controllers;

use App\Models\Tratamiento;
use Illuminate\Http\Request;

class TratamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tratamientos = Tratamiento::all();
        return view('admin.tratamientos.index', compact('tratamientos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tratamientos.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'costo' => 'required',
        ]);

        $tratamiento = new Tratamiento();
        $tratamiento->nombre = $request->nombre;
        $tratamiento->costo = $request->costo;
        $tratamiento->save();


        return redirect()->route('admin.tratamientos.index')
            ->with('mensaje', 'Se registro el tratamiento de la manera correcta')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tratamiento = Tratamiento::findorFail($id);
        return view('admin.tratamientos.show', compact('tratamiento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tratamiento = Tratamiento::findorFail($id);
        return view('admin.tratamientos.edit', compact('tratamiento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'costo' => 'required',
        ]);

        $tratamiento = Tratamiento::find($id);
        $tratamiento->nombre = $request->nombre;
        $tratamiento->costo = $request->costo;
        $tratamiento->save();


        return redirect()->route('admin.tratamientos.index')
            ->with('mensaje', 'Se actualizo el tratamiento de la manera correcta')
            ->with('icono', 'success');
    }

    public function confirmDelete($id)
    {
        $tratamiento = Tratamiento::findorFail($id);
        return view('admin.tratamientos.delete', compact('tratamiento'));
    }


    public function destroy($id)
    {
        Tratamiento::destroy($id);

        return redirect()->route('admin.tratamientos.index')
            ->with('mensaje', 'Se elimino al tratamiento de la manera correcta')
            ->with('icono', 'success');
    }
}
