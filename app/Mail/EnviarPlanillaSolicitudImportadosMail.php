<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EnviarPlanillaSolicitudImportadosMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $data;
    public $filePath;
    protected $emailsCc;
    protected $emailsBcc;
    protected $emailReplyTo;

    public function __construct($data,$filePath, $emailsCc = [], $emailsBcc = [], $emailReplyTo = null)
    {
        $this->data = $data;
        $this->filePath = $filePath;
        $this->emailsCc = $emailsCc;
        $this->emailsBcc = $emailsBcc;
        $this->emailReplyTo = $emailReplyTo;
    }

    public function build()
    {
        $mail = $this->view('prospectos-importados.mail.planilla-solicitud') // Asegúrate de crear esta vista
                    ->subject('Planilla Solicitud de Prospecto - Excel Adjunto')
                    ->attach($this->filePath, [
                        'as' => 'PlanillaSolicitud.xlsx',
                        'mime' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    ]);
        
        if ($this->emailsCc) {
            foreach ($this->emailsCc as $email) {
                $mail->cc($email);
            }
        }
        if ($this->emailsBcc) {
            foreach ($this->emailsBcc as $email) {
                $mail->bcc($email);
            }
        }

        if ($this->emailReplyTo) {
            $mail->replyTo($this->emailReplyTo);
        }
        return $mail;
    }
    /**
     * Get the message envelope.
     */
    /*public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Enviar Planilla Solicitud Importados Mail',
        );
    }

    /**
     * Get the message content definition.
     * /
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     * /
    public function attachments(): array
    {
        return [];
    }*/
}
