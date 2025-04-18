<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Asistencia extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function empleados()
    {
        return $this->belongsTo(Empleado::class,'empleado_id');
    }

    /*public function cargo()
{
    return $this->belongsTo(Cargo::class, 'cargo_id');
}*/
}
