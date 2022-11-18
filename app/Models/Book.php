<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'isbn',
        'title',
        'author_id',
        'genre_id',
        'purchased_at',
        'image',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }

    public function scopeSearch($query, $searchTerm)
    {
        if (!empty($searchTerm)) {
            return $query
                ->where('title', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('isbn', 'LIKE', '%' . $searchTerm . '%');
        }

        return $query;
    }

    public function reservedBooks(): HasMany
    {
        return $this->hasMany(ReservedBook::class);
    }

    public function isReservedBy(User $user)
    {
        return $this->reservedBooks->contains('user_id', $user->id);
    }

    protected function status(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ($this->reservedBooks->count() === 1) {
                    return '<span class="text-gray">Gereserveerd</span>';
                }
                return '<span class="text-green-700">Beschikbaar</span>';
            }
        );
    }
}
