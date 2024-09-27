<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Productos;

class Inventario extends Model
{

   

    public function productos(){
        return $this->belongsTo(Productos::class,'producto_id');
    }
    use HasFactory;
}
