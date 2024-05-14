<?php

namespace App\Http\Requests\DIAGNOSTICO_PACIENTE;

use Illuminate\Foundation\Http\FormRequest;

class diagnosticoPacientes extends FormRequest
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
            'paciente' => ['required','integer'],
            'diagnostico' => ['required', 'integer'],
            'observacion' => ['sometimes', 'string'],
            'fechaCreacion' => ['required', 'date_format:Y-m-d H:i:s']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'patient' => $this->paciente,
            'diagnostic' => $this->diagnostico,
            'creation' => $this->fechaCreacion
        ]);

        if ($this->observacion) { $this->merge([ 'observation' => $this->observacion ]);}
    }

    public function messages(){

        return [

            'paciente.required' => 'El codigo del paciente es requerido',
            'paciente.integer' => 'El codigo del paciente solo acepta numeros',

            'diagnostico.required' => 'El codigo del diagnostico es requerido',
            'diagnostico.string' => 'El codigo del diagnostico solo acepta numeros',

            'fechaCreacion.required' => 'La fecha de creacion es requerida.',
            'fechaCreacion.string' => 'El formato del campo fecha creacion no es correcto, debe tener el siguiente formato(2024-05-14 12:30:45)',
        ];
    }
}
