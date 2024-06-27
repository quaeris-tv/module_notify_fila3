<?php

declare(strict_types=1);

namespace Modules\Notify\Datas;

use Illuminate\Support\Arr;
use Modules\Tenant\Services\TenantService;
use Spatie\LaravelData\Data;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport;

class SmtpData extends Data
{
    public string $transport = 'smtp';

    public ?string $url = null;

    public string $host = '127.0.0.1';

    public int $port = 2525;

    public ?string $encryption = null; // 'tls';

    public ?bool $tls = null;

    public ?string $username = null;

    public ?string $password = null;

    public ?string $timeout = null;

    public ?string $local_domain = null;

    private static array $instance = [];

    public static function make(string $name = 'smtp'): self
    {
        if (! isset(self::$instance[$name])) {
            $data = TenantService::getConfig('mail');
            $data_name = Arr::get($data, 'mailers.'.$name);
            self::$instance[$name] = self::from($data);
        }

        return self::$instance[$name];
    }

    public function getTransport(): EsmtpTransport
    {
        $transport = new EsmtpTransport($this->host, $this->port, $this->tls);
        if ($this->username !== null && $this->password !== null) {
            $transport->setUsername($this->username);
            $transport->setPassword($this->password);
        }

        return $transport;
    }
}
