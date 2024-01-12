<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlantasProveedor extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;
    protected $table = 'plantas_proveedor';
    protected $guarded = [];
    
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('resolucion_sanitaria_planta')
            ->singleFile();
    }
    public function proveedor(): BelongsTo
    {
        return $this->BelongsTo(Proveedor::class,'id_proveedor','id');
    }
}
