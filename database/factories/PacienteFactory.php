<?php

namespace Database\Factories;

use App\Models\Paciente;
use App\Models\Hospital;
use Illuminate\Database\Eloquent\Factories\Factory;

class PacienteFactory extends Factory
{
    protected $model = Paciente::class;

    public function definition()
    {
        return [
            'nombre_completo' => $this->faker->name,
            'edad' => $this->faker->numberBetween(0, 18),
            'sexo' => $this->faker->randomElement(['M', 'F']),
            'fecha_nacimiento' => $this->faker->date,
            'ciudad_origen' => $this->faker->city,
            'fecha_inscripcion' => $this->faker->date,
            'hospital_id' => Hospital::factory(),
            'nombre_tutor' => $this->faker->name,
            'telefono_tutor' => $this->faker->phoneNumber,
        ];
    }
}
