<?php

    namespace App\Http\Services;

use App\Http\Requests\PACIENTE\PacienteRequest;
use App\Http\Requests\PACIENTE\UpdatePacienteRequest;
use App\Http\Responses\responses;
use App\Models\DIAGNOSTICO_PACIENTE\DiagnosticoPaciente;
use App\Models\PACIENTE\Paciente;

    class pacienteService{

        public function consultaPacientes() {
            try {
                $pacientes = Paciente::where('state', 1)->get();
                if (count($pacientes) > 0) {
                    $mensaje = 'Listado de pacientes';
                }else {
                    $mensaje = 'No hay pacientes registrados';
                }
                return responses::success($mensaje, 200, $pacientes);
            } catch (\Exception $e) {
                return responses::success('Fallo al consultar los pacientes', 500);
            }
        }

        public function registrarPaciente(PacienteRequest $request) {
            try {
                $registroPaciente = Paciente::create($request->all());
                return responses::success('Registro realizado con exito', 200, $registroPaciente);
            } catch (\Exception $e) {
                return responses::error('No se pudo realizar el registro del paciente favor comunicarce con la oficina a cargo, Error: '.$e, 419);
            }
        }

        public function existePaciente($documentoPaciente) {

            $existe = Paciente::where([['document', $documentoPaciente], ['state', 1]])->exists();
            if ($existe == true) {
                return responses::error('El paciente con numero de documento ' . $documentoPaciente . ' ya se encuentra registrado', 500);
            }else{
                return $existe;
            }
        }

        public function actulizarPacientes(UpdatePacienteRequest $request, Paciente $paciente){
            try {
                $paciente->update($request->all());
                return responses::success('Registro editado con exito', 200, $paciente);
            } catch (\Exception $e) {
                return responses::error('Error al editar el registro', 500);
            }
        }

        public function busquedaPorfiltro($filtro, $valor) {

            try {
                $query = Paciente::query();

                if($filtro == 'nombre'){
                    $query->where([['first_name', 'LIKE', '%'.$valor.'%'], ['state', 1]]);
                }elseif ($filtro == 'apellido') {
                    $query->where([['last_name', 'LIKE', '%'.$valor.'%'], ['state', 1]]);
                }elseif ($filtro == 'documento') {
                    $query->where([['document', '=', $valor], ['state', 1]]);
                }

                $paciente = $query->get();
                if (count($paciente) > 0) {
                    return responses::success('Consulta realizada con exito', 200, $paciente);
                }else{
                    return responses::success('Consulta realizada, no hay registros', 200);
                }

            } catch (\Exception $e) {
                return responses::error('Fallo al realizar la consulta Error: ' . $e, 500);
            }
        }

        public function eliminarRegistro(Paciente $idPaciente) {

            $respuesta = [];

            try {
                $idPaciente->state = 0;
                $idPaciente->save();
                $respuesta['estado'] = true;
                $respuesta['data'] = $idPaciente;
            } catch (\Exception $e) {
                $repuesta['estado'] = false;
                $respuesta['error'] = $e;
            }

            return $respuesta;
        }

        public function listadoPacientesPaginado($pagina) {
            try {
                $totalRegistrosPorPagina = 10;
                $registros = ($pagina - 1) * $totalRegistrosPorPagina;
                $data = [];
                $registro = Paciente::where('state', 1)->offset($registros)->limit($totalRegistrosPorPagina)->get();

                for ($i=0; $i < count($registro) ; $i++) {
                    $diagnosticos = DiagnosticoPaciente::where('patient', $registro[$i]->id)->with('diagnostico')->get();
                    $diagnostico = [];
                    $paciente = [];
                    for ($b=0; $b < count($diagnosticos); $b++) {
                        array_push($diagnostico, $diagnosticos[$b]->diagnostico);
                    }

                    $paciente['id'] = $registro[$i]->id;
                    $paciente['nombre'] = $registro[$i]->first_name;
                    $paciente['apellido'] = $registro[$i]->last_name;
                    $paciente['documento'] = $registro[$i]->document;
                    $paciente['fecha_nacimiento'] = $registro[$i]->birth_date;
                    $paciente['email'] = $registro[$i]->email;
                    $paciente['telefono'] = $registro[$i]->phone;
                    $paciente['genero'] = $registro[$i]->genre;
                    $paciente['diagnosticos'] = $diagnostico;

                    array_push($data, $paciente);
                }

                return responses::success('Consulta realizada con exito, Pagina #'.$pagina,200, $data);
            } catch (\Exception $e) {
                return responses::error('Fallo al realizar la consulta Error: ' . $e, 500);
            }
        }
    }
