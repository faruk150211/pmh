<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ServiceRequestConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $serviceRequest;

    public function __construct($serviceRequest)
    {
        $this->serviceRequest = $serviceRequest;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Service Request Confirmation - Premier Medical Housecall',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.service-request-confirmation',
            with: [
                'serviceRequest' => $this->serviceRequest,
            ],
        );
    }
}
