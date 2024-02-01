<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ProductosSolicitudImportadosAca2 extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $table = 'productos_solicitud_importados_aca2';
    protected $guarded = [];
    
}
