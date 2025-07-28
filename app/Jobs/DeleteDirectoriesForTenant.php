<?php

namespace App\Jobs;

use Stancl\Tenancy\Contracts\Tenant;
use Illuminate\Support\Facades\File;

class DeleteDirectoriesForTenant
{
    protected $tenant;

    public function __construct(Tenant $tenant)
    {
        $this->tenant = $tenant;
    }

    public function handle()
    {
        $tenantDirectory = storage_path("tenant_{$this->tenant->id}");

        if (File::exists($tenantDirectory)) {
            File::deleteDirectory($tenantDirectory);
        } else {
            logger("Diretório não encontrado: $tenantDirectory");
        }
    }
}

