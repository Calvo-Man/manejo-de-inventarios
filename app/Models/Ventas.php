<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Personas;
use App\Models\Productos;
class Ventas extends Model
{
    protected $fillable=[
        'producto_id',
        'cantidad',
        'precio_total',
    ];
    public function Productos(){
        return $this->belongsTo(Productos::class,'producto_id');
    }

    public function cliente(){
        return $this->belongsTo(Personas::class,'persona_id');
    }
    use HasFactory;
}
