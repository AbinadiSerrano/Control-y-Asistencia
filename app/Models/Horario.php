<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    protected $guarded = [];

        public function empleado()
        {
            return $this->hasMany(Empleado::class,'horario_id');
        }
}
