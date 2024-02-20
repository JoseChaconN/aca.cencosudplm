<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithTitle;

class FormatoCargaMasivaProductosImportadosExcel implements FromView, WithMultipleSheets, WithTitle
{
    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        // Seleccionar la vista Blade y pasar los datos correspondientes según la plantilla deseada
        return view('prospectos-importados.excel.formato-masivo-productos', $this->data);
    }
    public function title(): string
    {
        return 'Productos';
    }
    public function sheets(): array
    {
        return [
            'Hoja1' => $this,
            'Hoja2' => new FormatoCargaMasivaProductosImportados2Excel($this->data)
        ];
    }
}
