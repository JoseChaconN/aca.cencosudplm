<?php

namespace App\Mail;

use App\Models\SolicitudProspectoProductosImportadosAca;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotificacionProspecto extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $prospecto;

    public function __construct(SolicitudProspectoProductosImportadosAca $prospecto)
    {
        //
        $this->prospecto = $prospecto;
    }

    public function build()
    {
        return $this->view('prospectos-importados.mail.notificacion-prospecto')
                    ->subject('Nueva Solicitud de Prospecto');
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Notificacion Prospecto',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'prospectos-importados.mail.notificacion-prospecto',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
