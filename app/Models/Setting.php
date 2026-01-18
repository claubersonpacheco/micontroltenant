<?php

namespace App\Models;

use App\Services\BunnyServices;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Setting extends Model
{
    protected $guarded = [];

    public static function getPrefix()
    {
        $setting = self::first();
        return $setting?->prefix ?? null;
    }

    public function initials(): string
    {
        $title = $this->title;

        if($title == null){
            $title = config('app.name');
        }



        return Str::of($title)
            ->explode(' ')
            ->take(2)
            ->map(fn ($word) => Str::substr($word, 0, 1))
            ->implode('');
    }

    public function getDefaultAvatarUrl(): string
    {
        $initials = $this->initials();

        return "https://ui-avatars.com/api/?" . http_build_query([
                'name' => $initials,
                'background' => '3b82f6',
                'color' => 'ffffff',
                'size' => 200,
                'bold' => true,
            ]);
    }
    public function getlogoDefaultAttribute(): ?string
    {

        if ($this->logo) {
            return  BunnyServices::url($this->logo);
        }

        return $this->getDefaultAvatarUrl();
    }

    public function getlogoImpressDefaultAttribute(): ?string
    {

        if ($this->logo_impress) {
            return  BunnyServices::url($this->logo_impress);
        }

        return $this->getDefaultAvatarUrl();
    }

    public function getfaviconDefaultAttribute(): ?string
    {

        if ($this->favicon) {
            return  BunnyServices::url($this->favicon);
        }

        return $this->getDefaultAvatarUrl();
    }
}
