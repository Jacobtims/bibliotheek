<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function show()
    {
        $subscriptions = config('subscriptions.plans');

        return view('auth.subscription', compact('subscriptions'));
    }

    public function purchase(Request $request)
    {
        $request->validate([
            'subscription' => ['required', 'in:BASIS,STANDAARD,PREMIUM']
        ]);

        $subscription = config('subscriptions.plans.' . $request->subscription);

        Auth::user()->subscription()->create([
            'plan' => $subscription->code,
            'started_at' => now(),
            'ends_at' => now()->addYear(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Uw ' . $subscription->name . ' abonnement is nu actief!');
    }
}
