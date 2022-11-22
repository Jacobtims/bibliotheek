<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionPlan;
use Auth;

class SubscriptionController extends Controller
{
    public function show()
    {
        $subscriptionPlans = SubscriptionPlan::all();

        return view('auth.subscription', compact('subscriptionPlans'));
    }

    public function purchase(SubscriptionPlan $subscriptionPlan)
    {
        Auth::user()->subscription()->create([
            'subscription_plan_id' => $subscriptionPlan->id,
            'started_at' => now(),
            'ends_at' => now()->addMonth(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Uw ' . strtolower($subscriptionPlan->name) . ' abonnement is nu actief!');
    }
}
