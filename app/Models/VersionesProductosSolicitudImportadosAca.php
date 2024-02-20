<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class VersionesProductosSolicitudImportadosAca extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'versiones_productos_solicitud_importados_aca';
    protected $guarded = [];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
