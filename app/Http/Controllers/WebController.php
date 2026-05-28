<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\Event;
use App\Models\Horario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class WebController extends Controller
{
    public function index()
    {
        /*
        try {
            $horarios = Horario::with('doctor', 'consultorio')->where('consultorio_id', $id)->get();
            //print_r($horarios);
            return view('admin.horarios.cargar_datos_consultorios', compact('horarios'));
        } catch (\Exception $exception) {
            return response()->json(['mensaje' => 'Error']);
        }
        */

        $consultorios = Consultorio::all();
        return view('index', compact('consultorios'));
    }

    public function cargar_datos_consultorios($id)
    {
        $consultorio = Consultorio::find($id);

        try {
            $horarios = Horario::with('doctor', 'consultorio')->where('consultorio_id', $id)->get();
            //print_r($horarios);
            return view('cargar_datos_consultorio', compact('horarios', 'consultorio'));
        } catch (\Exception $exception) {
            return response()->json(['mensaje' => 'Error']);
        }
    }

    public function cargar_reserva_doctores($id)
    {
        try {
            $eventos = Event::where('doctor_id', $id)
                ->select('id','title', DB::raw('DATE_FORMAT(start, "%Y-%m-%d") as start'),DB::raw('DATE_FORMAT(end, "%Y-%m-%d") as end'))
                ->get();
            return response()->json($eventos);
            /*
            $eventosFormateados = $eventos->map(function ($evento) {
                return [
                    'id' => $evento->id,
                    'title' => $evento->title,
                    //'color' => $evento->color,
                    'start' => Carbon::parse($evento->start)->format('Y-m-d'),
                    'end' => Carbon::parse($evento->end)->format('Y-m-d'),
                ];
            });

            return response()->json($eventosFormateados);
            */
        } catch (\Exception $exception) {
            return response()->json(['mensaje' => 'Error']);
        }
    }
}
