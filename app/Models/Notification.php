<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Permission\Models\Role;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_id',
        'notification',
    ];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
