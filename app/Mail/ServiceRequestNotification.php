<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ServiceRequestNotification extends Mailable
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
            subject: 'New Service Request: ' . $this->serviceRequest->name,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.service-request-notification',
            with: [
                'serviceRequest' => $this->serviceRequest,
            ],
        );
    }
}
