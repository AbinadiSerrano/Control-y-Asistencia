<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licencia extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function empleados()
    {
        return $this->belongsTo(Empleado::class,'empleado_id');
    }
}
