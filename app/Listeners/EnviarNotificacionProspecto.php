<?php

namespace App\Listeners;

use App\Events\ProspectoCreado;
use App\Mail\NotificacionProspecto;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EnviarNotificacionProspecto
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProspectoCreado $event): void
    {
        //
        $usuarios = User::role(['aca importado', 'calidad'])->get();

        // Envía un correo a cada usuario
        foreach ($usuarios as $usuario) {
            Mail::to($usuario->email)->queue(new NotificacionProspecto($event->prospecto));
        }
        #Mail::to('sischaconn@gmail.com')->send(new NotificacionProspecto($event->prospecto));
    }
}
