<?php

namespace App\Jobs;

use App\Mail\BookTooLate;
use App\Models\LentBook;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class SendBookTooLateEmails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        $lentBooks = LentBook::whereNull('returned_at')
            ->get()
            ->filter(function ($lentBook) {
                return $lentBook->days_overdue > 0;
            })
            ->load(['user', 'book']);

        foreach ($lentBooks as $lentBook) {
            Mail::to($lentBook->user->email)->send(new BookTooLate($lentBook));
        }
    }
}
