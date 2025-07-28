<?php

namespace App\Jobs;

use Stancl\Tenancy\Contracts\Tenant;
use Illuminate\Support\Facades\File;

class CreateDirectoriesForTenant
{
    protected $tenant;

    public function __construct(Tenant $tenant)
    {
        $this->tenant = $tenant;
    }

    public function handle()
    {
        $this->tenant->run(function ($tenant) {
            $storage_path = storage_path();
            $suffixBase = config('tenancy.filesystem.suffix_base');

            $basePath = public_path($suffixBase); // Ex: public/tenants/
            $link = $basePath . $tenant->id;      // Ex: public/tenants/1
            $target = "{$storage_path}/app/public";

//            // Cria apenas o diretório base, não o caminho final do link
//            if (!is_dir($basePath)) {
//                @mkdir($basePath, 0777, true);
//            }

            // Cria subpastas necessárias
            @mkdir("{$storage_path}/app/public", 0777, true);
            @mkdir("{$storage_path}/framework/cache", 0777, true);

            // Se o link ainda não existir e não for um diretório, cria
            if (!file_exists($link) && !is_dir($link)) {
                if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                    exec("mklink /J " . escapeshellarg($link) . " " . escapeshellarg($target));
                } else {
                    symlink($target, $link);
                }
            }
        });




    }

}
