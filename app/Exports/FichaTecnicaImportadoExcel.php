<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class FichaTecnicaImportadoExcel implements FromView
{
    private $template;
    private $data;

    public function __construct($template, $data)
    {
        $this->template = $template;
        $this->data = $data;
    }

    public function view(): View
    {
        // Seleccionar la vista Blade y pasar los datos correspondientes según la plantilla deseada
        switch ($this->template) {
            case 'default':
                return view('prospectos-importados.excel.ficha-tecnica', $this->data);
            case 'licores':
                return view('prospectos-importados.excel.ficha-tecnica-licores', $this->data);
            // Agregar más casos según las plantillas que tengas
            default:
                return view('default_template', $this->data);
        }
    }
}
