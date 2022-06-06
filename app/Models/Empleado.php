<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vivienda;
use App\Models\Orden;
use App\Models\Roles;

class Empleado extends Model
{
    use HasFactory;


    public function vivivenda(){
        //tiene un hasOne
        return $this->hasOne(Vivivenda::class);
    }

    public function ordenes(){
        //tiene muchos
        return $this->hasMany(Orden::class);
    }

    public function roles(){
        return $this->belongsToMany(Roles::class);
    }
}
