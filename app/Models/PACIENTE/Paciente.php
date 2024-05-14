<?php

namespace App\Models\PACIENTE;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $table = 'paciente';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $foreingKey = [''];
    protected $fillable = [
        'id',
        'document',
        'first_name',
        'last_name',
        'birth_date',
        'email',
        'phone',
        'genre'
    ];

}
