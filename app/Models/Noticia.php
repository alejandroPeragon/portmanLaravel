<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'titulo',
        'descripcion',
        'descripcionCorta',
        'image',
        'comentarios'
    ];

    public function comentario() {
        return $this->hasMany(Comentario::class, 'id_noticia');
    }
}
