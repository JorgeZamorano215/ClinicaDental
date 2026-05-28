<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tPago extends Model
{
    use HasFactory;

    public function pago() {
    return $this->belongsTo(Pago::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    /*
    👉 ¿Mi tabla tiene la FK?

        ✅ Sí → belongsTo
        ❌ No → hasMany
    */
}
