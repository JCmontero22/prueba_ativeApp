<?php

namespace App\Models\DIAGNOSTICO;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    use HasFactory;

    protected $table = 'diagnosticos';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $foreingKey = [''];
    protected $fillable = [
        'id',
        'name',
        'description'
    ];
}
