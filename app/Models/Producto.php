<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Carrito;

class Producto extends Model
{
    use HasFactory;

    public function carritos(){
        return $this->belongsToMany(Carrito::class);
    }
}
