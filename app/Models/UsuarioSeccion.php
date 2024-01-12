<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioSeccion extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'usuarios_secciones';
}
