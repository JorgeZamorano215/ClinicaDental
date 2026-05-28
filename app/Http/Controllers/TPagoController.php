<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\tPago;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class TPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'fecha_pago' => 'required',
            'restante' => 'required|numeric|min:0',
            'pago' => 'required|numeric|min:0|lte:restante',
        ]);

        $estado = ($request->pago == $request->restante) ? 1 : 0;

        if($request->pago > $request->restante){
            return back()->withErrors([
                'pago' => 'El pago no puede ser mayor al restante.'
            ])->withInput();
            /*
            return redirect()->back()->with([
                'mensaje' => 'Pago incorrecto.',
                'icono' => 'error',
                'pago'=> 'El campo pago debe ser menor o igual al restante.',
            ]);
            */
        }

        $cobro = Pago::find($request->pago_id);
        $cobro->estado = $estado;
        $cobro->save();

        $movimiento = new tPago();
        $movimiento->fecha_pago = $request->fecha_pago;
        $movimiento->pago = $request->pago;
        $movimiento->pago_id = $request->pago_id;
        $movimiento->user_id = Auth::user()->id;
        $movimiento->save();


        
        return redirect()->route('admin.pagos.show',$request->pago_id)
            ->with('mensaje', 'Se registro el pago de la manera correcta')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(tPago $tPago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tPago $tPago)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'fecha_pago' => 'required',
            'pago' => 'required|numeric|min:0',
        ]);

        $cobro = Pago::findOrFail($request->pago_id);

        $totalPagos = tPago::where('pago_id', $request->pago_id)
            ->where('id', '!=', $id) // excluir el pago actual
            ->sum('pago');

        $abono = $totalPagos + $request->pago;

        $estado = ($abono == $cobro->costo) ? 1 : 0;

        if($abono > $cobro->costo){
            return back()->withErrors([
                'pago' => 'Al modificar el pago supera el costo del tratamiento.'
            ])->withInput()->with('modal_id', $id);
        }

        
        $cobro->estado = $estado;
        $cobro->save();

        $movimiento = tPago::findOrFail($id);
        $movimiento->fecha_pago = $request->fecha_pago;
        $movimiento->pago = $request->pago;
        $movimiento->user_id = Auth::user()->id;
        $movimiento->save();


        
        return redirect()->route('admin.pagos.show',$request->pago_id)
            ->with('mensaje', 'Se actualizo el pago de la manera correcta')
            ->with('icono', 'success');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $movimiento = tPago::find($id);

        $cobro = Pago::find($movimiento->pago_id);
        $cobro->estado = '0';
        $cobro->save();

        tPago::destroy($id);

        return redirect()->route('admin.pagos.show',$movimiento->pago_id)
            ->with('mensaje', 'Se elimino el pago de la manera correcta')
            ->with('icono', 'success');
    }
}
