<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LentBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'lent_at',
        'returned_at',
        'times_extended',
    ];

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    protected function lentUntil(): Attribute
    {
        return Attribute::make(
            get: fn() => Carbon::parse($this->lent_at)->addDays(14 * ($this->times_extended + 1)),
        );
    }
}
