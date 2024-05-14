<?php

namespace App\Http\Requests\PACIENTE;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePacienteRequest extends FormRequest
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
    public function rules(): array
    {
        $method = $this->method();

        if ($method == 'PUT') {
            return [
                'documentoPaciente' => ['required','integer'],
                'nombrePaciente' => ['required', 'string'],
                'apellidoPaciente' => ['required', 'string'],
                'fechaNacimientoPaciente' => ['required', 'date_format:Y-m-d'],
                'emailPaciente' => ['required', 'email'],
                'telefonoPaciente' => ['required', 'integer'],
                'generoPaciente' => ['required', 'string', 'in:masculino, femenino']
            ];
        }else{
            return [
                'documentoPaciente' => ['sometimes','integer'],
                'nombrePaciente' => ['sometimes', 'string'],
                'apellidoPaciente' => ['sometimes', 'string'],
                'fechaNacimientoPaciente' => ['sometimes', 'date_format:Y-m-d'],
                'emailPaciente' => ['sometimes', 'email'],
                'telefonoPaciente' => ['sometimes', 'integer'],
                'generoPaciente' => ['sometimes', 'string', 'in:masculino, femenino']
            ];
        }

    }

    protected function prepareForValidation()
    {

        if ($this->documentoPaciente) { $this->merge([ 'document' => $this->documentoPaciente ]);}
        if ($this->nombrePaciente) { $this->merge([ 'first_name' => $this->nombrePaciente ]);}
        if ($this->apellidoPaciente) { $this->merge([ 'last_name' => $this->apellidoPaciente ]);}
        if ($this->fechaNacimientoPaciente) { $this->merge([ 'birth_date' => $this->fechaNacimientoPaciente ]);}
        if ($this->emailPaciente) { $this->merge([ 'email' => $this->emailPaciente ]);}
        if ($this->telefonoPaciente) { $this->merge([ 'phone' => $this->telefonoPaciente ]);}
        if ($this->generoPaciente) { $this->merge([ 'genre' => $this->generoPaciente ]);}
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
