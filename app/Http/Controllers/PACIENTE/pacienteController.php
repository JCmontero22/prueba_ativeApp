<?php

namespace App\Http\Controllers\PACIENTE;

use App\Http\Controllers\Controller;
use App\Http\Requests\PACIENTE\PacienteRequest;
use App\Http\Requests\PACIENTE\UpdatePacienteRequest;
use App\Http\Responses\responses;
use App\Http\Services\diagnosticoPacienteService;
use App\Http\Services\pacienteService;
use App\Models\PACIENTE\Paciente;
use Illuminate\Http\Request;
use Spatie\LaravelIgnition\Http\Requests\UpdateConfigRequest;

class pacienteController extends Controller
{

    private $pacienteServices;
    private $diagnosticoServices;
    public function __construct(pacienteService $pacienteServices, diagnosticoPacienteService $diagnosticoServices) {
        $this->pacienteServices = $pacienteServices;
        $this->diagnosticoServices = $diagnosticoServices;
    }

    public function index(){
        return $this->pacienteServices->consultaPacientes();
    }

    public function store(PacienteRequest $paciente){
        $existePasinte = $this->pacienteServices->existePaciente($paciente->documentoPaciente);
        if ($existePasinte == false) {
            $registroPaciente = $this->pacienteServices->registrarPaciente($paciente);
            return $registroPaciente;
        }else{
            return $existePasinte;
        }
    }

    public function update(UpdatePacienteRequest $request, Paciente $paciente){
        return $this->pacienteServices->actulizarPacientes($request, $paciente);
    }

    public function consultaFiltros($filto, $valor) {
        return $this->pacienteServices->busquedaPorfiltro($filto, $valor);
    }

    public function eliminarRegistro(Paciente $idPaciente){
        $pacienteEliminado = $this->pacienteServices->eliminarRegistro($idPaciente);

        if ($pacienteEliminado['estado'] != false) {
            $diagnosticoEliminado = $this->diagnosticoServices->eliminarDiagnostico($idPaciente);
            if ($diagnosticoEliminado['estado'] != false) {
                $data['paciente_eliminado'] = $pacienteEliminado['data'];
                $data['diagnostico_eliminado'] = $diagnosticoEliminado['data'];

                return responses::success('El registro se ha eliminado con exito', 200, $data);
            }else{
                return responses::error('Fallo la eliminacion de los diganosticos Error: ' . $diagnosticoEliminado['error'], 500);
            }
        }else{
            return responses::error('Fallo la eliminacion del paciente Error: ' . $pacienteEliminado['error'], 500);
        }
    }

    public function listadoPacientesPaginado($pagina) {
        return $this->pacienteServices->listadoPacientesPaginado($pagina);
    }



}
