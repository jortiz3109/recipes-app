<?php

namespace App\Models;

use App\Models\Concerns\CanBeDisabled;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, CanBeDisabled;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'disabled_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeSearch(Builder $query, string $search = null): void
    {
        if (null !== $search) {
            match (Str::contains($search, '@')) {
                true => $this->byEmail($query, $search),
                false => $this->byName($query, $search)
            };
        }
    }

    private function byEmail(Builder $query, string $email): void
    {
        $query->where('email', 'like', "%$email%");
    }

    private function byName(Builder $query, string $name): void
    {
        $query->where('name', 'like', "%$name%");
    }
}
