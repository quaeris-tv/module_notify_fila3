<?php

namespace Modules\Notify\Models;

use Modules\Xot\Models\BaseModel;

class Notification extends BaseModel
{
    protected $fillable = [
        'message',
        'type',
        'read_at'
    ];

    protected $casts = [
        'read_at' => 'datetime'
    ];
}
