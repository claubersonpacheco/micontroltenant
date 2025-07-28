<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
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
        'photo_original_name',
    ];


    protected function getTenantId()
    {
        return tenancy()->tenant->id ?? 'default';
    }

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
        if ($this->photo_path && Storage::disk('public')->exists($this->photo_path)) {
            return Storage::disk('public')->url($this->photo_path);
        }

        return $this->getDefaultAvatarUrl();
    }

    public function getHasPhotoAttribute(): bool
    {
        return !empty($this->photo_path) && Storage::disk('public')->exists($this->photo_path);
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

        if ($this->photo_path && Storage::disk('public')->exists($this->photo_path)) {

            return Storage::disk('tenant')->url('tenant_'.tenant('id').'/'.$this->photo_path);
        }

        return $this->getDefaultAvatarUrl();
    }

}
