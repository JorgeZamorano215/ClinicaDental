<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $horarios = Horario::with('doctor', 'consultorio')->get();
        $consultorios = Consultorio::all();
        return view('admin.horarios.index', compact(
            'horarios',
            'consultorios'
        ));
    }

    public function cargar_datos_consultorios($id)
    {
        try {
            $consultorio = Consultorio::find($id);
            $horarios = Horario::with('doctor', 'consultorio')->where('consultorio_id', $id)->get();
            //print_r($horarios);
            return view('admin.horarios.cargar_datos_consultorios', compact('horarios','consultorio'));
        } catch (\Exception $exception) {
            return response()->json(['mensaje' => 'Error']);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctores = Doctor::all();
        $consultorios = Consultorio::all();
        $horarios = Horario::with('doctor', 'consultorio')->get();
        return view('admin.horarios.create', compact(
            'doctores',
            'consultorios',
            'horarios'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar datos del horario
        $request->validate([
            'dia' => 'required',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'consultorio_id' => 'required|exists:consultorios,id',
        ]);

        // Verificar si el horario ya existe para ese dia y rango de horas
        $horarioExistente = Horario::where('dia', $request->dia)
            ->where('consultorio_id', $request->consultorio_id) //Filtrar por consultorio
            ->where(function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('hora_inicio', '>=', $request->hora_inicio)
                        ->where('hora_inicio', '<', $request->hora_fin);
                })
                    ->orWhere(function ($query) use ($request) {
                        $query->where('hora_fin', '>', $request->hora_inicio)
                            ->where('hora_fin', '<=', $request->hora_fin);
                    })
                    ->orWhere(function ($query) use ($request) {
                        $query->where('hora_inicio', '<', $request->hora_inicio)
                            ->where('hora_fin', '>', $request->hora_fin);
                    });
            })
            ->exists();

        if ($horarioExistente) {
            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'Ya existe un horario que se superpone con el horario ingresado')
                ->with('icono', 'error');
        }

        $horario = new Horario();
        $horario->dia = $request->dia;
        $horario->hora_inicio = $request->hora_inicio;
        $horario->hora_fin = $request->hora_fin;
        $horario->doctor_id = $request->doctor_id;
        $horario->consultorio_id = $request->consultorio_id;
        $horario->save();

        return redirect()->route('admin.horarios.index')
            ->with('mensaje', 'Se registro el horario de la manera correcta')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $horario = Horario::find($id);
        return view('admin.horarios.show', compact(
            'horario'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $horario = Horario::find($id);
        $doctores = Doctor::all();
        $consultorios = Consultorio::all();
        return view('admin.horarios.edit', compact(
            'horario',
            'doctores',
            'consultorios'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar datos del horario
        $request->validate([
            'dia' => 'required',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'consultorio_id' => 'required|exists:consultorios,id',
        ]);

        // Verificar si el horario ya existe (EXCLUYENDO EL MISMO)
        $horarioExistente = Horario::where('dia', $request->dia)
            ->where('consultorio_id', $request->consultorio_id)
            ->where('id', '!=', $id) // 🔥 ESTA ES LA CLAVE
            ->where(function ($query) use ($request) {

                $query->where(function ($query) use ($request) {
                    $query->where('hora_inicio', '>=', $request->hora_inicio)
                        ->where('hora_inicio', '<', $request->hora_fin);
                })
                    ->orWhere(function ($query) use ($request) {
                        $query->where('hora_fin', '>', $request->hora_inicio)
                            ->where('hora_fin', '<=', $request->hora_fin);
                    })
                    ->orWhere(function ($query) use ($request) {
                        $query->where('hora_inicio', '<', $request->hora_inicio)
                            ->where('hora_fin', '>', $request->hora_fin);
                    });
            })
            ->exists();

        if ($horarioExistente) {
            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'Ya existe un horario que se superpone con el horario ingresado')
                ->with('icono', 'error');
        }

        $horario = Horario::find($id);

        $horario->dia = $request->dia;
        $horario->hora_inicio = $request->hora_inicio;
        $horario->hora_fin = $request->hora_fin;
        $horario->doctor_id = $request->doctor_id;
        $horario->consultorio_id = $request->consultorio_id;

        $horario->save();

        return redirect()->route('admin.horarios.index')
            ->with('mensaje', 'Se Actualizo el horario de la manera correcta')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function confirmDelete($id)
    {
        $horario = Horario::find($id);
        return view('admin.horarios.delete', compact(
            'horario'
        ));
    }

    public function destroy($id)
    {
        Horario::destroy($id);

        return redirect()->route('admin.horarios.index')
            ->with('mensaje', 'Se elimino el horario de la manera correcta')
            ->with('icono', 'success');
    }
}
