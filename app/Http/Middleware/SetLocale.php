<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {


        $settingLocale = optional(Setting::first())->locale;
        $sessionLocale = Session::get('locale');

        app()->setLocale(
            $sessionLocale
            ?? $settingLocale
            ?? config('app.locale')
        );

        return $next($request);
    }
}
