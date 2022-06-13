<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SugerenciaQueja extends Model
{
    use HasFactory;
    protected $table = 'QuejasSugerencias';
    protected $fillable = [
        'Nombre',
        'Apellidos',
        'email',
        'Contenido'
    ];
}
