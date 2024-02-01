<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SolicitudProspectoProductosImportadosAca extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'solicitud_prospecto_productos_importados_aca';
    protected $guarded = [];

    public function productos_solicitud_prospecto(): HasMany
    {
        return $this->HasMany(ProductosSolicitudImportadosAca::class,'id_solicitud','id');
    }
    public function responsable_creador(): BelongsTo
    {
        return $this->belongsTo(User::class,'id_creador', 'id')->withDefault()->withoutGlobalScopes();
    }
    public function responsable_comercial(): BelongsTo
    {
        return $this->belongsTo(User::class,'id_comercial', 'id')->withDefault()->withoutGlobalScopes();
    }
    public function responsable_calidad(): BelongsTo
    {
        return $this->belongsTo(User::class,'id_calidad', 'id')->withDefault()->withoutGlobalScopes();
    }
}
