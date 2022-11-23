<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $roles = auth()->user()->roles()->pluck('id');
        $notifications = Notification::whereIn('role_id', $roles)->limit(5)->latest()->get();

        return view('pages.dashboard.dashboard', compact('notifications'));
    }
}
