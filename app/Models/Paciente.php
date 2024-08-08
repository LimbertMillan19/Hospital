<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $table = 'pacientes';

    protected $fillable = [
        'nombre_completo', 'edad', 'sexo', 'fecha_nacimiento', 'ciudad_origen',
        'fecha_inscripcion', 'hospital_id', 'nombre_tutor', 'telefono_tutor'
    ];

    // Relación con la tabla Hospital
    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}
