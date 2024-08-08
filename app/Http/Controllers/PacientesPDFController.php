<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Hospital;
use Barryvdh\DomPDF\Facade\Pdf;

class PacientesPDFController extends Controller
{
    public function generatePDF(Paciente $paciente)
    {
        $data = [
            'paciente' => $paciente,
            'hospitales' => Hospital::all(),
        ];

        // Corrige la referencia a la vista
        $pdf = Pdf::loadView('pacientes.pdf', $data);
        return $pdf->download('paciente_' . $paciente->id . '.pdf');
    }
}
