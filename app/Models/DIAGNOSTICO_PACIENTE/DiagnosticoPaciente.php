<?php

namespace App\Models\DIAGNOSTICO_PACIENTE;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosticoPaciente extends Model
{
    use HasFactory;

    protected $table = 'paciente_diagnostico';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $foreingKey = ['patient', 'diagnostic'];
    protected $fillable = [
        'id',
        'patient',
        'diagnostic',
        'observation',
        'creation'
    ];

    public function diagnostico() {
        return $this->hasMany('App\Models\DIAGNOSTICO\Diagnostico', 'id', 'diagnostic');
    }

    public function paciente() {
        return $this->hasMany('App\Models\PACIENTE\Paciente', 'id', 'patient');
    }
}
