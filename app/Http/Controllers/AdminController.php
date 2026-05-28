<?php

namespace App\Http\Controllers;

use App\Models\Configuracione;
use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Event;
use App\Models\Horario;
use App\Models\Paciente;
use App\Models\Pago;
use App\Models\Secretaria;
use App\Models\Tratamiento;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function lateral() {
        $configuracion = Configuracione::all();
        
        return view('admin',compact('configuracion'
        ));
    }
    

    public function index() {
        $total_usuarios = User::count(); 
        $total_secretarias = Secretaria::count(); 
        $total_pacientes = Paciente::count(); 
        $total_consultorios = Consultorio::count(); 
        $total_doctores = Doctor::count(); 
        $total_horarios = Horario::count();
         
        $total_tratamientos = Tratamiento::count(); 
        $total_pagos = Pago::whereDate('fecha_pago', Carbon::today())->count(); 
        
        //$total_eventos = Event::count();
        $total_eventos = Event::whereDate('start', Carbon::today())->count(); 
        $citas_hoy = Event::whereDate('start', Carbon::today())->get();
        $citas_proximas = Event::whereDate('start', '>', Carbon::today())
            ->orderBy('start', 'asc')
            ->get();
        
        

        $total_configuraciones = Configuracione::count(); 
        
        $consultorios = Consultorio::all();
        $doctores = Doctor::all();
        $eventos = Event::all();
        
        return view('admin.index',compact('total_usuarios',
            'total_secretarias',
            'total_pacientes',
            'total_consultorios',
            'total_doctores',
            'total_horarios',

            'total_tratamientos',
            'total_pagos',
            
            'total_eventos',
            'citas_hoy',
            'citas_proximas',
            'total_configuraciones',
            'consultorios',
            'doctores',
            'eventos'
        ));
    }

    public function ver_reservas($id)
    {
        $eventos = Event::where('user_id',$id)->get();
        return view('admin.ver_reservas',compact('eventos'));

    }
}
