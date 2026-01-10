<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Services\BunnyServices;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'photo_path',
    ];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function scopeSearch($query, $value)
    {
        $query->where('name', 'like', "%{$value}%")
            ->orWhere('email', 'like', "%{$value}%");
    }

    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn ($word) => Str::substr($word, 0, 1))
            ->implode('');
    }


    public function getPhotoUrlAttribute(): ?string
    {
        if ($this->photo_path) {
            return  BunnyServices::url($this->photo_path);
        }

        return $this->getDefaultAvatarUrl();
    }

    public function getDefaultAvatarUrl(): string
    {
        $initials = $this->initials(); // agora usa o melhor método

        return "https://ui-avatars.com/api/?" . http_build_query([
                'name' => $initials,
                'background' => '3b82f6',
                'color' => 'ffffff',
                'size' => 200,
                'bold' => true,
            ]);
    }

    public function getPhotoUrlTenantAttribute(): ?string
    {

        if ($this->photo_path) {
            return  BunnyServices::url($this->photo_path);
        }

        return $this->getDefaultAvatarUrl();
    }

}
