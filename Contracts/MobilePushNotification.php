<?php

declare(strict_types=1);

namespace Modules\Notify\Contracts;

use Kreait\Firebase\Messaging\Message;

interface MobilePushNotification
{
    /**
     * Retrieves the payload to be sent to FCM service,
     * properly encapsulated as Message instance.
     */
    public function toCloudMessage(): Message;

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(?object $notifiable): array;
}
