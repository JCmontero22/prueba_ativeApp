<?php

namespace App\Http\Requests\PACIENTE;

use Illuminate\Foundation\Http\FormRequest;

class PacienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {

        return [
            'documentoPaciente' => ['required','integer'],
            'nombrePaciente' => ['required', 'string'],
            'apellidoPaciente' => ['required', 'string'],
            'fechaNacimientoPaciente' => ['required', 'date_format:Y-m-d'],
            'emailPaciente' => ['required', 'email'],
            'telefonoPaciente' => ['required', 'integer'],
            'generoPaciente' => ['required', 'string', 'in:masculino,femenino']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'document' => $this->documentoPaciente,
            'first_name' => $this->nombrePaciente,
            'last_name' => $this->apellidoPaciente,
            'birth_date' => $this->fechaNacimientoPaciente,
            'email' => $this->emailPaciente,
            'phone' => $this->telefonoPaciente,
            'genre' => $this->generoPaciente,
        ]);
    }

    public function messages(){

        return [

            'documentoPaciente.required' => 'El documento del pasiente es requerido',
            'documentoPaciente.integer' => 'El documento del paciente solo deben ser numeros',

            'nombrePaciente.required' => 'El nombre del paciente es requerido',
            'nombrePaciente.string' => 'Para el nombre del paciente solo se aceptan letras',

            'apellidoPaciente.required' => 'El apellido del paciente es requerido',
            'apellidoPaciente.string' => 'Para el apellido del paciente solo se aceptan letras',

            'fechaNacimientoPaciente.required' => 'La fecha de nacimiento del paciente es requerida.',
            'fechaNacimientoPaciente.date_format' => 'La fecha de nacimiento debe tener un formato 2024/05/14, año, mes y dia',

            'emailPaciente.required' => 'El email del paciente es requerido',
            'emailPaciente.email' => 'El email debe tener un formato prueba@gmail.com',

            'telefonoPaciente.required' => 'El telefono del paciente es requerido',
            'telefonoPaciente.email' => 'El campo telefono solo acepta numeros',

            'generoPaciente.required' => 'El genero del paciente es requerido',
            'generoPaciente.string' => 'El campo genero solo acepta letras',
            'generoPaciente.in' => 'El campo genero solo acepta los valores (masculino o femenino)',
        ];
    }
}
