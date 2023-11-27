<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class confimartionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $id;
    public $date;
    public $time;
    public $vehicle;
    public $place;
    public $driver;

    /**
     * Create a new message instance.
     */
    public function __construct($ride, $place)
    {
        $this->id = $ride->id;
        $this->date = $ride->date_t;
        $this->time = $ride->hour_t;
        $this->vehicle = $ride->cars->marcas->name_m . ' ' . $ride->cars->model_c . ' ' . $ride->cars->colors->name_co;
        $this->place = $place->name_p;
        $this->driver = $ride->cars->users->name;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmación',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.confirmationMail',
            with :[
                'id' => $this->id,
                'date' => $this->date,
                'time' => $this->time,
                'vehicle' => $this->vehicle,
                'place' => $this->place,
                'driver' => $this->driver,
            ],
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
