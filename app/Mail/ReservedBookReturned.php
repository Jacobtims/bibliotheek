<?php

namespace App\Mail;

use App\Models\Book;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReservedBookReturned extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public Book $book;
    public User $user;

    public function __construct(Book $book, User $user)
    {
        $this->book = $book;
        $this->user = $user;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Je gereserveerde boek ligt klaar',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.reserved-book-returned',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
