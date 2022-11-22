<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'subscription_plan_id',
        'user_id',
        'started_at',
        'ends_at'
    ];

    public function subscriptionPlan(): BelongsTo
    {
        return $this->belongsTo(SubscriptionPlan::class);
    }

    protected function isActive(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->whereDate('ends_at', '<=', today()),
        );
    }
}
