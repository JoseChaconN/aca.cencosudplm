<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        function DiffDates($start_date,$end_date) {
            $fechaInicio = strtotime($start_date);
            $fechaFin = strtotime($end_date);
            $diferenciaSegundos = $fechaFin - $fechaInicio;
            $diferenciaMinutos = $diferenciaSegundos / 60;
            $diferenciaHoras = $diferenciaMinutos / 60;
            $diferenciaDias = $diferenciaHoras / 24;
            return ['s' => $diferenciaSegundos, 'm' => $diferenciaMinutos, 'h' => $diferenciaHoras, 'd' => $diferenciaDias];
        }
    }
   /* public function DiffDates($start_date,$end_date) {
        $fechaInicio = strtotime($start_date);
        $fechaFin = strtotime($end_date);
        $diferenciaSegundos = $fechaFin - $fechaInicio;
        $diferenciaMinutos = $diferenciaSegundos / 60;
        $diferenciaHoras = $diferenciaMinutos / 60;
        $diferenciaDias = $diferenciaHoras / 24;
        return ['s' => $diferenciaSegundos, 'm' => $diferenciaMinutos, 'h' => $diferenciaHoras, 'd' => $diferenciaDias];
    }*/
}
