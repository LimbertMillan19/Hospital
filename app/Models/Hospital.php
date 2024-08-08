<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'ciudad',
        'direccion',
        'telefono'
    ];

    // Relación con la tabla Paciente
    public function pacientes()
    {
        return $this->hasMany(Paciente::class);
    }
}
