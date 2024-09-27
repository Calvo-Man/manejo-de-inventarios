<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntradaDeProductos extends Model
{
   
    public function Productos(){
        return $this->belongsTo(Productos::class,'producto_id');
    }
    use HasFactory;
}
