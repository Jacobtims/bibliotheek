<?php

namespace App\Mail;

use App\Models\LentBook;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookTooLate extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public LentBook $lentBook;

    public function __construct(LentBook $lentBook)
    {
        $this->lentBook = $lentBook;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Je boek is te laat',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.book-too-late',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
