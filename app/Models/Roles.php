<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Personas;
class Roles extends Model
{

    public function personas()
    {
        return $this->hasMany(Personas::class);
    }
    use HasFactory;
}
