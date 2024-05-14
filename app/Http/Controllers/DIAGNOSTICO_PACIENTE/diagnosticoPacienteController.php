<?php

namespace App\Http\Controllers\DIAGNOSTICO_PACIENTE;

use App\Http\Controllers\Controller;
use App\Http\Requests\DIAGNOSTICO_PACIENTE\diagnosticoPacientes;
use App\Http\Services\diagnosticoPacienteService;
use Illuminate\Http\Request;

class diagnosticoPacienteController extends Controller
{

    private $diagnosticoPaciente;

    public function __construct(diagnosticoPacienteService $diagnosticoPaciente) {
        $this->diagnosticoPaciente = $diagnosticoPaciente;
    }

    public function store(diagnosticoPacientes $request){
        $registroDiagnosticoPaciente = $this->diagnosticoPaciente->registrarDiagnosticoPaciente($request);
        return $registroDiagnosticoPaciente;
    }

    public function listadoDiagnosticosComunes(){
        return $this->diagnosticoPaciente->listadoDiagnosticosComunes();
    }
}
