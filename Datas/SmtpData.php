<?php

declare(strict_types=1);

namespace Modules\Notify\Datas;

use Modules\Tenant\Services\TenantService;
use Spatie\LaravelData\Data;

class SmtpData extends Data
{
    public string $transport = 'smtp';
    public ?string $url = null;
    public string $host = '127.0.0.1';
    public int $port = 2525;
    public string $encryption = 'tls';
    public ?string $username = null;
    public ?string $password = null;
    public ?string $timeout = null;
    public ?string $local_domain = null;

    private static ?self $instance = null;

    public static function make(string $name = 'smtp'): self
    {
        if (! self::$instance) {
            $data = TenantService::getConfig('mail');

            self::$instance = self::from($data);
        }

        return self::$instance;
    }
}