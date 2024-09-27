<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Roles;
use App\Models\Ventas;

class Personas extends Model
{
    use HasFactory;
    protected $fillable = ['role_id'];
     // Agregar el punto y coma aquí
    public function roles()
    {
        return $this->belongsTo(Roles::class,'role_id');
    }

    public function ventas(){
        return $this->hasMany(Ventas::class);
    }
}

