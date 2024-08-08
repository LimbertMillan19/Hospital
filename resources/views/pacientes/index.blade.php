@extends('layouts.app')

@section('content')
    <h1 class="mb-4 text-3xl font-bold mt-4 text-center">Lista de Pacientes</h1>
    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#crearPacienteModal">
        <i class="bi bi-person-plus"></i> Crear Nuevo Paciente
    </button>


    <table class="table table-striped table-hover mt-2">
        <thead class="table-dark">
            <tr>
                <th class="px-2 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nombre</th>
                <th class="px-2 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Edad</th>
                <th class="px-2 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Sexo</th>
                <th class="px-2 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Fecha de Nacimiento</th>
                <th class="px-2 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Ciudad</th>
                <th class="px-2 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Fecha de Inscripción</th>
                <th class="px-2 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Hospital</th>
                <th class="px-2 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nombre del Tutor</th>
                <th class="px-2 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Teléfono del Tutor</th>
                <th class="px-2 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pacientes as $paciente)
            <tr>
                <td class="px-2 py-5 border-b border-gray-200 bg-white text-sm">{{ $paciente->nombre_completo }}</td>
                <td class="px-2 py-5 border-b border-gray-200 bg-white text-sm">{{ $paciente->edad }}</td>
                <td class="px-2 py-5 border-b border-gray-200 bg-white text-sm">{{ $paciente->sexo }}</td>
                <td class="px-2 py-5 border-b border-gray-200 bg-white text-sm">{{ $paciente->fecha_nacimiento }}</td>
                <td class="px-2 py-5 border-b border-gray-200 bg-white text-sm">{{ $paciente->ciudad_origen }}</td>
                <td class="px-2 py-5 border-b border-gray-200 bg-white text-sm">{{ $paciente->fecha_inscripcion }}</td>
                <td class="px-2 py-5 border-b border-gray-200 bg-white text-sm">{{ $paciente->hospital->nombre }}</td>
                <td class="px-2 py-5 border-b border-gray-200 bg-white text-sm">{{ $paciente->nombre_tutor }}</td>
                <td class="px-2 py-5 border-b border-gray-200 bg-white text-sm">{{ $paciente->telefono_tutor }}</td>
                <td class="px-2 py-5 border-b border-gray-200 bg-white text-sm">
                    <div class="flex flex-col space-y-2">
                        <button type="button" class="btn btn-primary px-4" data-toggle="modal" data-target="#editarPacienteModal-{{ $paciente->id }}">
                            Editar
                        </button>
                        <button type="button" class="btn btn-danger px-3" data-toggle="modal" data-target="#eliminarPacienteModal-{{ $paciente->id }}">
                            Eliminar
                        </button>
                        <a href="{{ route('pacientes.pdf', $paciente) }}" class="btn btn-secondary">
                            Generar PDF
                        </a>
                    </div>
                </td>
            </tr>

<!-- Modal de Edición -->
<div class="modal fade" id="editarPacienteModal-{{ $paciente->id }}" tabindex="-1" role="dialog" aria-labelledby="editarPacienteModalLabel-{{ $paciente->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarPacienteModalLabel-{{ $paciente->id }}">Editar Paciente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editarPacienteForm-{{ $paciente->id }}" action="{{ route('pacientes.update', $paciente) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nombre_completo">Nombre Completo:</label>
                        <input type="text" class="form-control" name="nombre_completo" value="{{ $paciente->nombre_completo }}" required>
                    </div>
                    <div class="form-group">
                        <label for="edad">Edad:</label>
                        <input type="number" class="form-control" name="edad" value="{{ $paciente->edad }}" required>
                    </div>
                    <div class="form-group">
                        <label for="sexo">Sexo:</label>
                        <input type="text" class="form-control" name="sexo" value="{{ $paciente->sexo }}" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                        <input type="text" class="form-control" name="fecha_nacimiento" value="{{ $paciente->fecha_nacimiento }}" required>
                    </div>
                    <div class="form-group">
                        <label for="ciudad_origen">Ciudad de Origen:</label>
                        <input type="text" class="form-control" name="ciudad_origen" value="{{ $paciente->ciudad_origen }}" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_inscripcion">Fecha de Inscripción:</label>
                        <input type="text" class="form-control" name="fecha_inscripcion" value="{{ $paciente->fecha_inscripcion }}" required>
                    </div>
                    <div class="form-group">
                        <label for="hospital_id">Hospital:</label>
                        <select class="form-control" name="hospital_id" required>
                            @foreach ($hospitales as $hospital)
                                <option value="{{ $hospital->id }}" {{ $paciente->hospital_id == $hospital->id ? 'selected' : '' }}>{{ $hospital->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nombre_tutor">Nombre del Tutor:</label>
                        <input type="text" class="form-control" name="nombre_tutor" value="{{ $paciente->nombre_tutor }}" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono_tutor">Teléfono del Tutor:</label>
                        <input type="text" class="form-control" name="telefono_tutor" value="{{ $paciente->telefono_tutor }}" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="document.getElementById('editarPacienteForm-{{ $paciente->id }}').submit();">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>

            <!-- Modal de Eliminación -->
            <div class="modal fade" id="eliminarPacienteModal-{{ $paciente->id }}" tabindex="-1" role="dialog" aria-labelledby="eliminarPacienteModalLabel-{{ $paciente->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="eliminarPacienteModalLabel-{{ $paciente->id }}">Eliminar Paciente</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ¿Estás seguro de que deseas eliminar al paciente {{ $paciente->nombre_completo }}?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <form action="{{ route('pacientes.destroy', $paciente) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>

    <!-- Modal de Creación -->
<div class="modal fade" id="crearPacienteModal" tabindex="-1" role="dialog" aria-labelledby="crearPacienteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearPacienteModalLabel">Crear Nuevo Paciente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="crearPacienteForm" action="{{ route('pacientes.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nombre_completo">Nombre Completo:</label>
                        <input type="text" class="form-control" name="nombre_completo" required>
                    </div>
                    <div class="form-group">
                        <label for="edad">Edad:</label>
                        <input type="number" class="form-control" name="edad" required>
                    </div>
                    <div class="form-group">
                        <label for="sexo">Sexo:</label>
                        <select class="form-control" name="sexo" required>
                            <option value="">Seleccione el sexo</option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                        <input type="date" class="form-control" name="fecha_nacimiento" required>
                    </div>
                    <div class="form-group">
                        <label for="ciudad_origen">Ciudad de Origen:</label>
                        <input type="text" class="form-control" name="ciudad_origen" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_inscripcion">Fecha de Inscripción:</label>
                        <input type="date" class="form-control" name="fecha_inscripcion" required>
                    </div>
                    <div class="form-group">
                        <label for="hospital_id">Hospital:</label>
                        <select class="form-control" name="hospital_id" required>
                            <option value="">Seleccione un hospital</option>
                            @foreach ($hospitales as $hospital)
                                <option value="{{ $hospital->id }}">{{ $hospital->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nombre_tutor">Nombre del Tutor:</label>
                        <input type="text" class="form-control" name="nombre_tutor" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono_tutor">Teléfono del Tutor:</label>
                        <input type="text" class="form-control" name="telefono_tutor" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="document.getElementById('crearPacienteForm').submit();">Guardar Paciente</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Código para manejar la lógica de los modales
    $('.editarPacienteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var pacienteId = button.data('paciente-id');
        var modal = $(this);
        modal.find('form').attr('action', '{{ route("pacientes.update", ":id") }}'.replace(':id', pacienteId));
    });

    $('.eliminarPacienteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var pacienteId = button.data('paciente-id');
        var modal = $(this);
        modal.find('form').attr('action', '{{ route("pacientes.destroy", ":id") }}'.replace(':id', pacienteId));
    });
</script>
@endsection