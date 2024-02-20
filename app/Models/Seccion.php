<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Seccion extends Model
{
    use HasFactory;
    protected $table = 'secciones';
    protected $guarded = [];
    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'usuarios_secciones', 'codigo_seccion', 'id_usuario');
    }
}
