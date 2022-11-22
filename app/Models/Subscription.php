<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan',
        'user_id',
        'started_at',
        'ends_at'
    ];

    protected function isActive(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->whereDate('ends_at', '<=', today()),
        );
    }
}
