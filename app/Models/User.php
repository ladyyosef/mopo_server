<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Filament\Models\Contracts\HasName;

class User extends Authenticatable  implements MustVerifyEmail, FilamentUser, HasName
{
    use HasApiTokens, HasFactory, Notifiable;

    public function canAccessFilament(): bool
    {
        return $this->usertype->name == 'admin';
    }

    public function getFilamentName(): string
    {
        return "{$this->Full_name}";
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'Full_name',
        'email',
        'password',
        'User_Type_id',
        'phone',
        'postal_code',
        'City',
        'Nationality',
        'Birth_date'

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

    public function usertype(): BelongsTo
    {
        return $this->belongsTo(usertype::class, 'User_Type_id');
    }
    public function getProfileImageUrlAttribute()
    {
        if ($this->Profile_image) {
            return Storage::url($this->Profile_image);
        }

        return null;
    }
}
