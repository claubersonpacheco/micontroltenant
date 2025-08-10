<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = [];

    public static function getPrefix()
    {
        $setting = self::first();
        return $setting?->prefix ?? null;
    }
}
