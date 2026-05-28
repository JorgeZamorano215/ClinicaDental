<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    use HasFactory;

    // Un tratamiento tiene muchos doctores
    public function servicios(){
        return $this->hasMany(Servicio::class);
    }
    
    
}
