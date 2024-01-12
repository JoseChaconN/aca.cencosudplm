<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class VisitaInspectiva extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia, SoftDeletes;
    protected $guarded = [];

    public function proveedor(): HasOne
    {
        return $this->HasOne(Proveedor::class,'id','id_proveedor')->withDefault();
    }
    public function responsable(): HasOne
    {
        return $this->HasOne(User::class,'id','id_responsable')->withDefault();
    }
    public function seccion_visita_inspectiva(): HasOne
    {
        return $this->HasOne(Seccion::class,'codigo','id_seccion')->withDefault();
    }
}
