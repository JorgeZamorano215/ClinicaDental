<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Servicio;
use App\Models\Tratamiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $doctores = Doctor::orderBy('id')->get();

        // 👇 si no viene doctor_id, toma el primero
        $doctorId = $request->doctor_id ?? $doctores->first()?->id;

        $servicios = collect(); // colección vacía

        if ($doctorId) {
            $servicios = Servicio::where('doctor_id', $doctorId)
                ->pluck('tratamiento_id');
        }

        $tratamientos = Tratamiento::all();

        return view('admin.servicios.index', compact(
            'doctores',
            'doctorId',
            'servicios',
            'tratamientos'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servicio $servicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $doctorId = $request->doctor_id;
        $tratamientos = $request->tratamientos ?? [];

        // eliminar existentes
        Servicio::where('doctor_id', $doctorId)->delete();

        // insertar nuevos
        foreach ($tratamientos as $tratamientoId) {
            Servicio::create([
                'doctor_id' => $doctorId,
                'tratamiento_id' => $tratamientoId
            ]);
        }

        return redirect()->back()
            ->with('mensaje', 'Se registraron los servicios de la manera correcta')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servicio $servicio)
    {
        //
    }
}
