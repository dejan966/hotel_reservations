<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Reservation;

class ReservationCopy extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     */
    public function __construct(protected Reservation $reservation, protected $fullPrice)
    {
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Reservation Confirmation',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.reservation-copy',
            with: [
                'email' => $this->reservation->email,
                'full_price' => $this->fullPrice,
                'price' => $this->reservation->room->price,
                'arrival_date' => \Carbon\Carbon::parse($this->reservation->arrival_date)->format('Y-m-d'),
                'departure_date' => \Carbon\Carbon::parse($this->reservation->departure_date)->format('Y-m-d'),
                'name' => $this->reservation->room->name,
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