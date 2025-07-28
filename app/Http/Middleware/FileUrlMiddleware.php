<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FileUrlMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Altera dinamicamente a URL do disco 'public' com base no tenant atual
        config()->set(
            'filesystems.disks.public.url',
            url('/' . config('tenancy.filesystem.suffix_base') . '/' . tenant('id'))
        );

        // Reinicializa o storage com a nova config
        app()->forgetInstance('filesystem');
        app()->bind('filesystem', function ($app) {
            return $app->loadComponent('filesystems', \Illuminate\Filesystem\FilesystemServiceProvider::class, 'filesystem');
        });

        return $next($request);
    }
}

