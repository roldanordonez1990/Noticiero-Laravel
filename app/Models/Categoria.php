<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre',

    ];

    //Una categoría pertenece a muchas  noticia. Por eso hasMany
    public function notices(){
        return $this->hasMany(Noticia::class);
    }
}
