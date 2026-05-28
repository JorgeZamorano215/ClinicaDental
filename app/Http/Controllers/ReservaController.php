<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function reportes(){
        return view('admin.reservas.reportes');
    }

    public function cargar_reservas(Request $request)
    {
        $inicio = Carbon::parse($request->start);
        $fin = Carbon::parse($request->end);

        if ($fin->lt($inicio)) {
            return response()->json([
                'mensaje' => 'La fecha fin no puede ser menor que la inicio'
            ], 422);
        }

        try {
            $eventos = Event::whereDate('start', '>=', $inicio)
                ->whereDate('start', '<=', $fin)
                ->get();

            return view('admin.reservas.cargar_reservas', compact('eventos'));
        } catch (\Exception $exception) {
            return response()->json(['mensaje' => 'Error']);
        }
    
    }

    public function confirmar(Request $request, $id)
    {
        $cita = Event::findorFail($id);
        $cita->estado = '2';
        $cita->save();

        return redirect()->route('admin.reservas.reportes')
            ->with('mensaje','Se registro la confirmacion de la cita medica la manera correcta')
            ->with('icono','success');

        
    }

    public function destroy($id)
    {
        Event::destroy($id);

        return redirect()->route('admin.reservas.reportes')
            ->with('mensaje', 'Se elimino la reserva de la manera correcta.')
            ->with('icono', 'success');
    }
}
