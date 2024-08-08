<?php
namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Hospital;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::with('hospital')->get();
        $hospitales = Hospital::all();
        return view('pacientes.index', compact('pacientes', 'hospitales'));
    }

    public function create()
    {
        $hospitales = Hospital::all();
        return view('pacientes.create', compact('hospitales'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required',
            'edad' => 'required|integer',
            'sexo' => 'required|in:M,F',
            'fecha_nacimiento' => 'required|date',
            'ciudad_origen' => 'required',
            'fecha_inscripcion' => 'required|date',
            'hospital_id' => 'required|exists:hospitals,id',
            'nombre_tutor' => 'required',
            'telefono_tutor' => 'required',
        ]);

        Paciente::create($request->all());

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente creado exitosamente.');
    }

    public function edit(Paciente $paciente)
    {
        $hospitales = Hospital::all();
        return view('pacientes.edit', compact('paciente', 'hospitales'));
    }

    public function update(Request $request, Paciente $paciente)
    {
        $request->validate([
            'nombre_completo' => 'required',
            'edad' => 'required|integer',
            'sexo' => 'required|in:M,F',
            'fecha_nacimiento' => 'required|date',
            'ciudad_origen' => 'required',
            'fecha_inscripcion' => 'required|date',
            'hospital_id' => 'required|exists:hospitals,id',
            'nombre_tutor' => 'required',
            'telefono_tutor' => 'required',
        ]);

        $paciente->update($request->all());

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente actualizado exitosamente.');
    }

    public function destroy(Paciente $paciente)
    {
        $paciente->delete();

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente eliminado exitosamente.');
    }
}