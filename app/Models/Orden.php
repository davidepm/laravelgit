<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Empleado;

class Orden extends Model
{
    use HasFactory;


    public function empleado(){
        //pertenece a
        return $this->belongsTo(Empleado::class);
    }
}
