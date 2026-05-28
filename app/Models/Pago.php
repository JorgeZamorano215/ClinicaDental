<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    //El pago pertenece a un doctor

    public function doctor() {
        return $this->belongsTo(Doctor::class);
    }
    
    //El pago pertenece a un paciente
    public function paciente() {
        return $this->belongsTo(Paciente::class);
    }

    public function tpagos() {
        return $this->hasMany(Tpago::class);
    }
}
