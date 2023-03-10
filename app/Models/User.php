<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function employee(): HasOne
    {
        return $this->hasOne(Employee::class);
    }

    public function reader(): HasOne
    {
        return $this->hasOne(Reader::class);
    }

    public function lentBooks(): HasMany
    {
        return $this->hasMany(LentBook::class);
    }

    public function subscription(): HasOne
    {
        return $this->hasOne(Subscription::class)->whereDate('ends_at', '>=', today());
    }

    public function scopeSearch($query, $searchTerm)
    {
        if (!empty($searchTerm)) {
            return $query
                ->where('name', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('email', 'LIKE', '%' . $searchTerm . '%');
        }

        return $query;
    }
}
