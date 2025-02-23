<?php

namespace App\Models;

use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Filament\Models\Contracts\{FilamentUser, HasAvatar, HasName};
use TomatoPHP\FilamentMediaManager\Traits\InteractsWithMediaFolders;

class User extends Authenticatable implements
    FilamentUser,
    MustVerifyEmail,
    HasName,
    HasMedia,
    HasAvatar
{
    use InteractsWithMedia,
        InteractsWithMediaFolders,
        HasApiTokens,
        HasRoles,
        HasFactory,
        Notifiable,
        SoftDeletes;

    protected $fillable = [
        'username',
        'email',
        'firstname',
        'lastname',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function canAccessPanel(\Filament\Panel $panel): bool
    {
        return true;
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return Cache::remember("user_avatar_{$this->id}", 60 * 60 * 24, function () {
            $prefix = urlencode(Str::substr($this->name, 0, 2));
            $avatar = 'https://ui-avatars.com/api/?name=' . $prefix . '&color=f8fafc&background=475569';
            $media = $this->getFirstMedia('avatar');

            if ($media) {
                return $media->getTemporaryUrl(now()->addHours(24));
            } else {
                return $avatar;
            }
        });
    }

    public function getFilamentName(): string
    {
        return $this->username;
    }

    public function getNameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }

    public function getVerifiedAttribute()
    {
        if ($this->email_verified_at) {
            return true;
        }

        return false;
    }

    public function isSuperAdmin(): bool
    {
        return $this->hasRole(config('filament-shield.super_admin.name'));
    }

    public function registerMediaCollections(Media|null $media = null): void
    {
        $this->addMediaCollection('avatar')
            ->useDisk('private');
    }
}
