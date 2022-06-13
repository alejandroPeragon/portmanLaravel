<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'Contenido',
        'id_noticia',
        'id_user'
    ];


    public function noticias() {
        return $this->belongsTo(Noticia::class, 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id');
    }
}
