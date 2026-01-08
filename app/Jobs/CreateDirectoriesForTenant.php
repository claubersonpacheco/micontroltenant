<?php

namespace App\Jobs;

use Stancl\Tenancy\Contracts\Tenant;

class CreateDirectoriesForTenant
{
    protected Tenant $tenant;

    public function __construct(Tenant $tenant)
    {
        $this->tenant = $tenant;
    }

    public function handle()
    {
        $this->tenant->run(function () {
            $storagePath = storage_path();
            $suffixBase = config('tenancy.filesystem.suffix_base'); // Ex: public/tenants/
            $basePath = public_path($suffixBase);
            $link = $basePath . $this->tenant->id;   // Ex: public/tenants/1
            $target = "{$storagePath}/app/public";

            // Garante que o umask não bloqueie permissões no Linux
            $oldUmask = umask(0);

            // Diretórios base que precisamos criar
            $dirs = [
                "{$storagePath}/app/public/images/logo",
                "{$storagePath}/app/public/images/user",
                "{$storagePath}/app/public/images/entries",
                "{$storagePath}/app/public/images/reports",
                "{$storagePath}/framework/cache",
                "{$storagePath}/framework/views",
                "{$storagePath}/framework/sessions",
                "{$storagePath}/framework/testing",
            ];

            foreach ($dirs as $dir) {
                if (!is_dir($dir)) {
                    mkdir($dir, 0775, true);
                }

                // Só ajusta grupo/permissão se não for Windows
                if (strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN') {
                    @chmod($dir, 0775);
                    @chgrp($dir, 'www-data'); // grupo do PHP-FPM no Linux
                }
            }

            // Restaura umask
            umask($oldUmask);

            // Cria symlink no public/tenants/{id}
            if (!file_exists($link) && !is_dir($link)) {
                if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                    // Windows: mklink /J <link> <target>
                    exec("mklink /J " . escapeshellarg($link) . " " . escapeshellarg($target));
                } else {
                    // Linux: symlink normal
                    symlink($target, $link);
                }
            }
        });
    }
}
