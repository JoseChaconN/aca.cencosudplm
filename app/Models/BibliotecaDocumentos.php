<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BibliotecaDocumentos extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia, SoftDeletes;
    protected $table = 'biblioteca_documentos';
    protected $guarded = [];

    public function proveedor(): HasOne
    {
        return $this->HasOne(Proveedor::class,'id','id_proveedor')->withDefault();
    }
    public function producto_prospecto(): HasOne
    {
        return $this->HasOne(ProductosSolicitudProspectosAca::class,'id','id_prospecto')->withDefault();
    }
    public function producto(): HasOne
    {
        return $this->HasOne(Producto::class,'id','id_producto')->withDefault();
    }
    public function documento(): HasOne
    {
        return $this->HasOne(ListadoDocumentos::class,'id','id_documento')->withDefault();
    }
    public function responsable(): HasOne
    {
        return $this->HasOne(User::class,'id','id_user')->withDefault();
    }
    public function producto_prospecto_importado(): HasOne
    {
        return $this->HasOne(ProductosSolicitudImportadosAca::class,'id','id_prospecto_importado')->withDefault();
    }




    /*public function prospecto()
    {
        return $this->belongsTo(Prospecto::class, 'id_prospecto', 'id');
    }
    public function documento_prospecto()
    {
        return $this->belongsTo(ListadoDocumentos::class, 'id_documento', 'id');
    }*/


}
