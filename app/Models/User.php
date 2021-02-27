<?php

namespace App\Models;

use App\Traits\HasKeyUUID;
use App\Traits\HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasKeyUUID, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'ability'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'ability' => 'array',
    ];

    public function getAvatarAttribute ()
    {
        $colors   = ['374151', 'B91C1C', 'B45309', '047857', '1D4ED8', '4338CA', '6D28D9'];
        $bgcolors = ['E5E7EB', 'FECACA', 'FDE68A', 'A7F3D0', 'BFDBFE', 'C7D2FE', 'DDD6FE'];
        $index = hexdec(substr(sha1($this->name), 0, 10)) % count($colors);
        $color   = $colors[$index];
        $bgcolor = $bgcolors[$index];

        // $bgcolor = substr(crc32($this->name), 0, 6);
        // $color   = substr(md5(dechex($this->name)), 0, 6);

        return $this->avatart ?: "https://ui-avatars.com/api/?bold=true&background=$bgcolor&color=$color&name=". urlencode($this->name);
    }
}
