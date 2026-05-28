<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Paciente;
use App\Models\Pago;
use App\Models\tPago;
use App\Models\Tratamiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagos = Pago::with('doctor', 'paciente')->get();
        return view('admin.pagos.index', compact(
            'pagos'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctores = Doctor::all();
        $pacientes = Paciente::latest()->get();
        $tratamientos = Tratamiento::all();

        return view('admin.pagos.create', compact(
            'doctores',
            'pacientes',
            'tratamientos'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'fecha_pago' => 'required',
        'tratamiento' => 'required|string',
        'costo' => 'required|numeric|min:0',
        'pago' => 'required|numeric|min:0|lte:costo',
        'observacion' => 'nullable|string',
        ]);

        $estado = ($request->pago == $request->costo) ? 1 : 0;

        $cobro = new Pago();
        $cobro->fecha_pago = $request->fecha_pago;
        $cobro->tratamiento = $request->tratamiento;
        $cobro->costo = $request->costo;
        $cobro->estado = $estado;
        $cobro->observacion = $request->observacion;
        $cobro->doctor_id = $request->doctor_id;
        $cobro->paciente_id = $request->paciente_id;
        $cobro->save();

        $movimiento = new tPago();
        $movimiento->fecha_pago = $request->fecha_pago;
        $movimiento->pago = $request->pago;
        $movimiento->pago_id = $cobro->id;
        $movimiento->user_id = Auth::user()->id;
        $movimiento->save();


        return redirect()->route('admin.pagos.index')
            ->with('mensaje', 'Se registro el pago de la manera correcta')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pago = Pago::with(['doctor', 'paciente', 'tpagos'])->findOrFail($id);
        $pagos = tPago::where('pago_id', $pago->id)->get();
        $totalPagos = $pagos->sum('pago');
        
        $restante = $pago->costo - $totalPagos;
        $restante = max($restante, 0);

        // Ahora $pago->tpagos tiene todos los pagos parciales
        return view('admin.pagos.show', compact('pago', 'pagos', 'totalPagos', 'restante'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pago = Pago::with(['doctor', 'paciente', 'tpagos'])->findOrFail($id);

        $doctores = Doctor::all();
        $pacientes = Paciente::latest()->get();
        $tratamientos = Tratamiento::all();

        $primerPago = tPago::where('pago_id', $id)
            ->orderBy('id', 'asc')
            ->first();

        return view('admin.pagos.edit', compact('pago',
            'doctores',
            'pacientes',
            'tratamientos',
            'primerPago'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'fecha_pago' => 'required',
            'tratamiento' => 'required|string',
            'costo' => 'required|numeric|min:0',
            'pago' => 'required|numeric|min:0',
            'observacion' => 'nullable|string',
        ]);

        $totalPagos = tPago::where('pago_id', $id)
            ->where('id', '!=', $request->tpago_id) // excluir el pago actual
            ->sum('pago');

        $abono = $totalPagos + $request->pago;

        $estado = ($abono == $request->costo) ? 1 : 0;

        if($abono > $request->costo){
            return back()->withErrors([
                'pago' => 'El pago no puede ser mayor al costo, revisa los demas pagos'
            ])->withInput();
            /*
            return redirect()->back()->with([
                'mensaje' => 'Pago incorrecto.',
                'icono' => 'error',
                'pago'=> 'El campo pago debe ser menor o igual al restante.',
            ]);
            */
        }

        $cobro = Pago::find($id);
        $cobro->fecha_pago = $request->fecha_pago;
        $cobro->tratamiento = $request->tratamiento;
        $cobro->costo = $request->costo;
        $cobro->estado = $estado;
        $cobro->observacion = $request->observacion;
        $cobro->doctor_id = $request->doctor_id;
        $cobro->paciente_id = $request->paciente_id;
        $cobro->save();

        $movimiento = tPago::find($request->tpago_id);
        $movimiento->fecha_pago = $request->fecha_pago;
        $movimiento->pago = $request->pago;
        $movimiento->user_id = Auth::user()->id;
        $movimiento->save();


        return redirect()->route('admin.pagos.index')
            ->with('mensaje', 'Se actualizo el pago de la manera correcta')
            ->with('icono', 'success');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function confirmDelete($id)
    {
        $pago = Pago::with(['doctor', 'paciente', 'tpagos'])->findOrFail($id);
        $pagos = tPago::where('pago_id', $pago->id)->get();
        $totalPagos = $pagos->sum('pago');
        
        $restante = $pago->costo - $totalPagos;
        $restante = max($restante, 0);

        $doctores = Doctor::all();
        $pacientes = Paciente::latest()->get();

        // Ahora $pago->tpagos tiene todos los pagos parciales
        return view('admin.pagos.delete', compact('pago', 'pagos', 'totalPagos', 'restante', 'doctores', 'pacientes'));
        
    }

    public function destroy($id)
    {
        $pago = Pago::findOrFail($id);
        $pago->tpagos()->delete(); // elimina tPagos
        $pago->delete(); // elimina el pago

        return redirect()->route('admin.pagos.index')
            ->with('mensaje', 'Se elimino el pago de la manera correcta')
            ->with('icono', 'success');
    }
}
