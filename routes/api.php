<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'paciente', 'namespace' => 'App\Http\Controllers\PACIENTE'], function(){
    Route::get('/consultarPacientes', 'pacienteController@index');
    Route::post('/registrarPaciente', 'pacienteController@store');
    Route::put('/actualizarDatosPaciente/{paciente}', 'pacienteController@update');
    Route::patch('/actualizarDatosPaciente/{paciente}', 'pacienteController@update');
    Route::get('consultaFiltro/{filto}/{valor}', 'pacienteController@consultaFiltros');
    Route::patch('eliminarRegistro/{idPaciente}', 'pacienteController@eliminarRegistro');
    Route::get('listaPaginada/{pagina}', 'pacienteController@listadoPacientesPaginado');
});


Route::group(['prefix' => 'diagnosticoPaciente', 'namespace' => 'App\Http\Controllers\DIAGNOSTICO_PACIENTE'], function(){
    Route::post('/registro', 'diagnosticoPacienteController@store');
    Route::get('/listaDiagnosticosComunes', 'diagnosticoPacienteController@listadoDiagnosticosComunes');
});
