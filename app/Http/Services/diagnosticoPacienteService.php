<?php

    namespace App\Http\Services;

use App\Http\Requests\DIAGNOSTICO_PACIENTE\diagnosticoPacientes;
use App\Http\Responses\responses;
use App\Models\DIAGNOSTICO_PACIENTE\DiagnosticoPaciente;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

    class diagnosticoPacienteService{

        public function registrarDiagnosticoPaciente(diagnosticoPacientes $request){

            try {
                $registro = DiagnosticoPaciente::create($request->all());
                return responses::success('Registro realizado con exito', 200, $registro);
            } catch (\Exception $e) {
                return responses::error('No se pudo realizar el registro, favor comunicarce con la oficina a cargo, Error: '.$e, 500);
            }
        }

        public function listadoDiagnosticosComunes(){

            try {
                $hoy = Carbon::now();
                $hoyFormateado = $hoy->toDateTimeString();

                $paraSeisMeses = Carbon::now();
                $seisMesesAtras = $paraSeisMeses->subMonths(6);
                $seisMesesAtrasFormateado = $seisMesesAtras->toDateTimeString();

                $resultado = DiagnosticoPaciente::select('diagnostic')->selectRaw('diagnostic, count(distinct id) AS cantidad')->whereBetween(DB::raw('DATE(creation)'), [$seisMesesAtrasFormateado, $hoyFormateado])->with('diagnostico')->groupBy('diagnostic')->orderByDesc('cantidad')->take(5)->get();

                return responses::success('Consulta realizada con exito', 200, $resultado);

            } catch (\Exception $e) {
                return responses::success('Fallo al realizar la consulta Error: ' . $e, 500);
            }
        }

        public function eliminarDiagnostico($idPaciente) {

            $respuesta = [];

            try {
                $resultado = DiagnosticoPaciente::where('patient', $idPaciente->id)->update(['state' => 0]);

                $respuesta['estado'] = true;
                $respuesta['data'] = $resultado;
            } catch (\Exception $e) {
                $respuesta['estado'] = false;
                $respuesta['error'] = $e;
            }

            return $respuesta;
        }

    }
