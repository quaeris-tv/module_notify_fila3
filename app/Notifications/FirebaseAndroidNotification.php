<?php

declare(strict_types=1);

/**
 * @see https://iftikhar-ahmed.medium.com/send-push-notifications-in-laravel-using-firebase-on-your-android-device-f585621db900
 */

namespace Modules\Notify\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Stringable;
use Kreait\Firebase\Messaging\AndroidConfig;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Message;
use Kreait\Firebase\Messaging\MessageData;
use Kreait\Firebase\Messaging\Notification as FirebaseNotification;
use Modules\Notify\Contracts\MobilePushNotification;
use Modules\Notify\Datas\FirebaseNotificationData;
use Modules\Notify\Notifications\Channels\FirebaseCloudMessagingChannel;

/**
 * Class for sending notifications via Firebase Cloud Messaging to Android devices.
 */
class FirebaseAndroidNotification extends Notification implements MobilePushNotification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @param FirebaseNotificationData $data The Firebase notification data
     */
    public function __construct(public FirebaseNotificationData $data)
    {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param object $notifiable The entity to be notified
     * @return array<int, class-string>
     */
    public function via(object $notifiable): array
    {
        return [
            FirebaseCloudMessagingChannel::class,
        ];
    }

    /**
     * Create the Firebase Cloud message for the notification.
     *
     * @param object $notifiable The entity to be notified
     * @return CloudMessage
     */
    public function toFirebase(object $notifiable): CloudMessage
    {
        // Create a valid Android configuration
        $androidConfig = [
            'ttl' => '3600s',
            'priority' => 'high',
        ];
        
        // Add notification only if data is in a valid format
        // Verify that $this->data->data is accessible
        $dataProperty = $this->data->data ?? null;
        if ($dataProperty !== null) {
            // Create a notification array conforming to AndroidConfig expectations
            $notification = [];
            
            // Add only supported fields with correct types
            $allowedKeys = ['title', 'body', 'icon', 'color', 'sound', 'click_action'];
            
            foreach ($allowedKeys as $key) {
                if (isset($dataProperty[$key]) && (is_string($dataProperty[$key]) && $dataProperty[$key] !== '')) {
                    $notification[$key] = $dataProperty[$key];
                }
            }
            
            // Add notification only if it contains valid data
            if (!empty($notification)) {
                $androidConfig['notification'] = $notification;
            }
        }
        
        return CloudMessage::new()
            ->withNotification(FirebaseNotification::create($this->data->title, $this->data->body))
            ->withAndroidConfig(AndroidConfig::fromArray($androidConfig));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param object|null $notifiable The entity to be notified
     * @return array<string, mixed>
     */
    public function toArray(?object $notifiable): array
    {
        return [];
    }

    /**
     * Convert to a Firebase Cloud message.
     *
     * @return Message
     */
    public function toCloudMessage(): Message
    {
        $notificationData = $this->data->data;
        
        /**
         * @var array<non-empty-string, string|Stringable>
         */
        $data = [];
        
        // Ensure each key is a non-empty string and each value is string or Stringable
        foreach ($notificationData as $key => $value) {
            if (is_string($key) && $key !== '' && (is_string($value) || $value instanceof Stringable)) {
                $data[$key] = $value;
            }
        }

        return CloudMessage::new()
            ->withHighestPossiblePriority()
            ->withData($data);
    }
}
