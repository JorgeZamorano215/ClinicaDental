<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use Illuminate\Http\Request;

class ConsultorioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultorios = Consultorio::all();
        return view('admin.consultorios.index', compact('consultorios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.consultorios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'ubicacion' => 'required',
            'capacidad' => 'required',
            'especialidad' => 'required',
            'estado' => 'required',
        ]);
        
        
        Consultorio::create($request->all());
        /*
        $consultorio = new Consultorio();

        $consultorio->nombre = $request->nombre;
        $consultorio->ubicacion = $request->ubicacion;
        $consultorio->capacidad = $request->capacidad;
        $consultorio->telefono = $request->telefono;
        $consultorio->especialidad = $request->especialidad;
        $consultorio->estado = $request->estado;

        $consultorio->save();
        */

        return redirect()->route('admin.consultorios.index')
            ->with('mensaje', 'Se registro al consultorio de la manera correcta')
            ->with('icono', 'success');
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $consultorio = Consultorio::findorFail($id);
        return view('admin.consultorios.show', compact('consultorio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $consultorio = Consultorio::findorFail($id);
        return view('admin.consultorios.edit', compact('consultorio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        

        $request->validate([
            'nombre' => 'required',
            'ubicacion' => 'required',
            'capacidad' => 'required',
            'especialidad' => 'required',
            'estado' => 'required',
        ]);

        $consultorio = Consultorio::find($id);

        $consultorio->update($request->all());
        /*
        $consultorio->nombre = $request->nombre;
        $consultorio->ubicacion = $request->ubicacion;
        $consultorio->capacidad = $request->capacidad;
        $consultorio->telefono = $request->telefono;
        $consultorio->especialidad = $request->especialidad;
        $consultorio->estado = $request->estado;

        $consultorio->save();
        */

        return redirect()->route('admin.consultorios.index')
            ->with('mensaje', 'Se actualizo al consultorio de la manera correcta')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function confirmDelete($id)
    {
        $consultorio = Consultorio::findorFail($id);
        return view('admin.consultorios.delete', compact('consultorio'));
    }

    public function destroy($id)
    {
        //Consultorio::destroy($id);
        
        $consultorio= Consultorio::find($id);
        $consultorio->delete();

        return redirect()->route('admin.consultorios.index')
            ->with('mensaje', 'Se elimino al consultorio de la manera correcta')
            ->with('icono', 'success');
    }
}
