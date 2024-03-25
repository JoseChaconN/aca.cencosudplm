<?php

namespace App\Imports;

use App\Models\ProductosSolicitudImportadosAca;
use App\Models\ProductosSolicitudImportadosAca2;
use App\Models\Seccion;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class FormatoCargaMasivaProductosImportadosImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    protected $request;
    protected $formato_excel;
    protected $id_solicitud;
    protected $id_proveedor;
    public function __construct($request, $formato_excel,$id_solicitud,$id_proveedor)
    {
        $this->request = $request;
        $this->formato_excel = $formato_excel;
        $this->id_solicitud = $id_solicitud;
        $this->id_proveedor = $id_proveedor;
        
    }
    public function collection(Collection $row)
    {
        //
       #dd($row);
       foreach ($row as $key => $value) {
            if(!empty($value['descripcion']) && !empty($value['codigo_seccion'])){
                $seccion = Seccion::where('codigo',$value['codigo_seccion'])->latest()
                ->first();
                $producto_prospecto=ProductosSolicitudImportadosAca::create([
                    'id_solicitud' => $this->id_solicitud,
                    'id_proveedor' => $this->id_proveedor,
                    'upc_bar_code' =>$value['ean_13'],
                    'product_name' =>$value['descripcion'],
                    'id_seccion' => $value['codigo_seccion'],
                    'net_weight' => $value['contenido_neto'],
                    'seccion' => $seccion->nombre,
                    'version' => '0000',
                    'version_description' => 'Versión inicial',
                ]);
                ProductosSolicitudImportadosAca2::create([
                    'id_solicitud' => $this->id_solicitud,
                    'id_producto' => $producto_prospecto->id,
                ]);
            }
       }
    }
}
