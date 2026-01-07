<?php

namespace App\Services;

use Bunny\Storage\Client;
use Illuminate\Http\UploadedFile;

class BunnyServices
{
    /**
     * Cria o cliente do BunnyCDN
     */
    protected static function client(): Client
    {
        return new Client(
            config('services.bunny.storage_password'), // password da Storage Zone
            config('services.bunny.storage_zone'),     // Storage Zone
            config('services.bunny.storage_region')    // Região
        );
    }

    /**
     * Faz upload de um arquivo
     * Retorna o path relativo (salvar no banco)
     */
    public static function upload(
        UploadedFile $file,
        string $pasta,
        ?string $tenantId = null
    ): string {
        $tenantId ??= tenant('id');

        $filename = uniqid() . '-' . $file->getClientOriginalName();
        $path = trim("{$tenantId}/{$pasta}/{$filename}", '/');

        // ⚡ Passar o caminho físico do arquivo, sem ler o conteúdo
        self::client()->upload($file->getRealPath(), $path);

        return $path; // path relativo para salvar no banco
    }

    /**
     * Verifica se o arquivo existe
     */
    public static function exists(string $filePath): bool
    {
        try {
            $path = self::normalizePath($filePath);
            return self::client()->exists($path);
        } catch (\Throwable) {
            return false;
        }
    }

    /**
     * Deleta arquivo (somente se existir)
     */
    public static function delete(string $filePath): void
    {
        $path = self::normalizePath($filePath);

        if (self::client()->exists($path)) {
            self::client()->delete($path);
        }
    }

    /**
     * Atualiza arquivo = delete antigo + upload novo
     */
    public static function update(
        ?string $oldFilePath,
        UploadedFile $newFile,
        string $pasta,
        ?string $tenantId = null
    ): string {
        if ($oldFilePath) {
            self::delete($oldFilePath);
        }

        return self::upload($newFile, $pasta, $tenantId);
    }

    /**
     * Normaliza path: remove URL ou StorageZone da frente
     */
    protected static function normalizePath(string $filePath): string
    {
        // Se veio URL completa, pega apenas o path
        if (str_starts_with($filePath, 'http')) {
            $filePath = parse_url($filePath, PHP_URL_PATH);
        }

        $filePath = ltrim($filePath, '/');

        $storageZone = trim(config('services.bunny.storage_zone'), '/');

        if (str_starts_with($filePath, $storageZone . '/')) {
            $filePath = substr($filePath, strlen($storageZone) + 1);
        }

        return $filePath;
    }

    /**
     * Gera URL pública para exibir no frontend
     */
    public static function url(?string $path): ?string
    {
        if (empty($path)) {
            return null;
        }

        return rtrim(config('services.bunny.cdn_url'), '/') . '/'
            . ltrim($path, '/');
    }
}
