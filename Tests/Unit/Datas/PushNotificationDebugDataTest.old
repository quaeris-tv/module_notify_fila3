<?php

declare(strict_types=1);

namespace Tests\Unit\Modules\Notify\Datas;

use Kreait\Firebase\Messaging\MulticastSendReport;
use Mockery\Mock;
use Modules\Notify\Contracts\CanReceivePushNotifications;
use Modules\Notify\Contracts\MobilePushNotification;
use Modules\Notify\Datas\PushNotificationDebugData;
use Tests\TestCase;

/**
 * Class PushNotificationDebugDataTest.
 *
 * @covers \Modules\Notify\Datas\PushNotificationDebugData
 */
final class PushNotificationDebugDataTest extends TestCase
{
    private PushNotificationDebugData $pushNotificationDebugData;

    private CanReceivePushNotifications|Mock $notifiable;

    private MobilePushNotification|Mock $notification;

    private MulticastSendReport|Mock $sendReport;

    protected function setUp(): void
    {
        parent::setUp();

        $this->notifiable = \Mockery::mock(CanReceivePushNotifications::class);
        $this->notification = \Mockery::mock(MobilePushNotification::class);
        $this->sendReport = \Mockery::mock(MulticastSendReport::class);
        $this->pushNotificationDebugData = new PushNotificationDebugData($this->notifiable, $this->notification, $this->sendReport);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->pushNotificationDebugData, $this->notifiable, $this->notification, $this->sendReport);
    }

    public function testMake(): void
    {
        /*
         *
         *
         * @todo This test is incomplete.
         */
        self::markTestIncomplete();
    }

    public function testToArray(): void
    {
        /*
         *
         *
         * @todo This test is incomplete.
         */
        self::markTestIncomplete();
    }
}
