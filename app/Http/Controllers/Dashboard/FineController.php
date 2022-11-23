<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\LentBook;

class FineController extends Controller
{
    public function index()
    {
        $lentBooks = LentBook::whereUserId(auth()->id())
            ->whereNull('returned_at')
            ->get()
            ->map(function ($lentBook) {
                // Difference between lent_until and today
                $diff = $lentBook->days_overdue;
                // Difference * fine amount
                $lentBook->fine = $diff > 0 ? $diff * 0.50 : 0.00;

                return $lentBook;
            });

        $fines = $lentBooks->sum('fine');

        return view('pages.dashboard.fines', compact('fines'));
    }
}
