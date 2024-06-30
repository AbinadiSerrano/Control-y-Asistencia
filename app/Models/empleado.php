<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleado extends Model
{
    use HasFactory;
    protected $guarded = [];



    public function horarios()
    {
        return $this->belongsTo(Horario::class,'horario_id');
    }

    public function cargos()
    {
        return $this->belongsTo(Cargo::class,'cargo_id');
    }

    public function licencias()
    {
        return $this->hasMany(Licencia::class,'licencia_id');
    }
    public function asistencias()
    {
        return $this->hasMany(Asistencia::class, 'empleado_id');
    }
}
