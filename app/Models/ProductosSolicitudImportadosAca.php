<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductosSolicitudImportadosAca extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;
    protected $table = 'productos_solicitud_importados_aca';
    protected $guarded = [];

    public function pais(): HasOne
    {
        return $this->hasOne(Pais::class, 'id', 'country')->withDefault();
    }
    public function obs(): HasOne
    {
        return $this->hasOne(ProductosSolicitudImportadosAca2::class,'id_producto','id');
    }
    public function versiones(): HasMany
    {
        return $this->hasMany(VersionesProductosSolicitudImportadosAca::class,'producto_id','id')->orderBy('created_at', 'desc');
    }
}
