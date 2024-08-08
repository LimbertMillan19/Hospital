@extends('layouts.app')

@section('content')
    <h1>Crear Nuevo Paciente</h1>
    <form action="{{ route('pacientes.store') }}" method="POST">
        @csrf
        <div>
            <label for="nombre_completo">Nombre Completo:</label>
            <input type="text" name="nombre_completo" required>
        </div>
        <div>
            <label for="edad">Edad:</label>
            <input type="number" name="edad" required>
        </div>
        <div>
            <label for="sexo">Sexo:</label>
            <select name="sexo" required>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
            </select>
        </div>
        <div>
            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" name="fecha_nacimiento" required>
        </div>
        <div>
            <label for="ciudad_origen">Ciudad de Origen:</label>
            <input type="text" name="ciudad_origen" required>
        </div>
        <div>
            <label for="fecha_inscripcion">Fecha de Inscripción:</label>
            <input type="date" name="fecha_inscripcion" required>
        </div>
        <div>
            <label for="hospital_id">Hospital:</label>
            <select name="hospital_id" required>
                @foreach($hospitales as $hospital)
                    <option value="{{ $hospital->id }}">{{ $hospital->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="nombre_tutor">Nombre del Tutor:</label>
            <input type="text" name="nombre_tutor" required>
        </div>
        <div>
            <label for="telefono_tutor">Teléfono del Tutor:</label>
            <input type="text" name="telefono_tutor" required>
        </div>
        <button type="submit">Crear Paciente</button>
    </form>
@endsection