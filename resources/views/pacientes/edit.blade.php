@extends('layouts.app')

@section('content')
    <div class="modal fade" id="editarPacienteModal" tabindex="-1" role="dialog" aria-labelledby="editarPacienteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarPacienteModalLabel">Editar Paciente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editarPacienteForm" action="{{ route('pacientes.update', $paciente) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nombre_completo">Nombre Completo:</label>
                            <input type="text" class="form-control" name="nombre_completo" value="{{ $paciente->nombre_completo }}" required>
                        </div>
                        <!-- Resto de los campos similar al formulario de creación -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="document.getElementById('editarPacienteForm').submit();">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>

</script>
@endsection