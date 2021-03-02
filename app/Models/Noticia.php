<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'titulo',
        'descripcion',
        'imagen',

    ];

    //Una noticia pertenece a una sola categoría. Por eso belongsTo
    public function categories(){
        return $this->belongsTo(Categoria::class);
    }
    /**
     *
     */

    //Una noticia pertenece a un solo user. Por eso belongsTo
    public function usuariosNoticia(){
        return $this->belongsTo(User::class);
    }
}
