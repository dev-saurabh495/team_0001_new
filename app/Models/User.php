<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'member_id',
        'profile_picture',
        'email_otp',
        'otp_expires_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'email_otp',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'otp_expires_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected static function booted(): void
    {
        static::created(function (User $user) {
            if (empty($user->member_id)) {
                $user->updateQuietly([
                    'member_id' => 'T0001-' . str_pad(
                        $user->id,
                        6,
                        '0',
                        STR_PAD_LEFT
                    ),
                ]);
            }
        });
    }
}
