<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class FormatoCargaMasivaProductosImportados2Excel implements FromView, WithTitle
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
    
    public function view(): View
    {
        // Seleccionar la vista Blade y pasar los datos correspondientes según la plantilla deseada
        #dd($this->data);
        return view('prospectos-importados.excel.formato-masivo-productos-2', $this->data);
    }
    public function title(): string
    {
        return 'Secciones';
    }
}
