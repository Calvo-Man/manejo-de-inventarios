<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
  protected $fillable=[
    'nombre',
    'descripcion',
    'precio',
    'categoria_id',    

  ];
    public function categorias(){
        return $this->belongsTo(Categorias::class,'categoria_id');
    }

    public function EntradaDeProductos(){
        return $this->hasMany(EntradaDeProductos::class);
    }
    public function Ventas(){
      return $this->hasMany(Ventas::class);
  }

    public function Inventario(){
        return $this->hasOne(Inventario::class,'inventario_id');
    }
    use HasFactory;
}
