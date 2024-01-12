<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductosSolicitudProspectosAca extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;
    protected $table = 'productos_solicitud_prospectos_aca';
    protected $guarded = [];

    public function pais(): HasOne
    {
        return $this->hasOne(Pais::class, 'id', 'pais_origen')->withDefault();
    }
    public function certificaciones(): HasMany
    {
        return $this->hasMany(BibliotecaDocumentos::class, 'id_prospecto', 'id');
    }
}
