<?php

declare(strict_types=1);

namespace Modules\Notify\Datas;

use Spatie\LaravelData\Data;

class SmtpData extends Data
{
    public string $host;
    public int $port;
    public string $encryption;
    public ?string $username = null;
    public ?string $password = null;
}