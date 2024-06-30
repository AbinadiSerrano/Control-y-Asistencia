<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function empleado()
    {
        return $this->hasMany(Empleado::class,'cargo_id');
    }
}
