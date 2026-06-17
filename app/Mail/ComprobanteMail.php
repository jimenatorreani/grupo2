<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Barryvdh\DomPDF\Facade\Pdf; //para enviar adjunto
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use App\Models\VentaCabecera;

class ComprobanteMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public VentaCabecera $venta;

    public function __construct(VentaCabecera $venta)
    {
        $this->venta = $venta;
    }

    

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
         return new Envelope(
            subject: 'Comprobante de compra N° '.$this->venta->id,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.comprobante-por-correo',
            with: [
            'venta' => $this->venta
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
         $pdf = Pdf::loadView(
            'backend.carrito.comprobante.comprobante-pdf',
            [
                'venta' => $this->venta
            ]
        );

        return [
            Attachment::fromData(
            fn () => $pdf->output(),
            'comprobante_'.$this->venta->id.'.pdf'
            )->withMime('application/pdf'),
        ];
    }
}
