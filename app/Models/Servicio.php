<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'tratamiento_id',
    ];

    // Doctor.php
    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

    // Tratamiento.php
    public function tratamiento(){
        return $this->belongsTo(Tratamiento::class);
    }
}
