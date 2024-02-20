<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Proveedor extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'Proveedores';
    protected $guarded = [];
    public function plantas(): HasMany
    {
        return $this->HasMany(PlantasProveedor::class,'id_proveedor','id');
    }
    public function contactos_comercial(): HasMany
    {
        return $this->HasMany(ContactosProveedor::class,'id_proveedor','id')->where('tipo',1);
    }
    public function contactos_calidad(): HasMany
    {
        return $this->HasMany(ContactosProveedor::class,'id_proveedor','id')->where('tipo',2);
    }
}
