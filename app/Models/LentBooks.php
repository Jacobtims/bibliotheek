<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LentBooks extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'lent_at',
        'returned_at',
        'times_extended',
    ];
}
