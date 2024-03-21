<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Notifications\Channels;

use Kreait\Firebase\Contract\Messaging;
use Mockery\Mock;
use Modules\Notify\Notifications\Channels\FirebaseCloudMessagingChannel;
use Tests\TestCase;

/**
 * Class FirebaseCloudMessagingChannelTest.
 *
 * @covers \Modules\Notify\Notifications\Channels\FirebaseCloudMessagingChannel
 */
final class FirebaseCloudMessagingChannelTest extends TestCase
{
    private FirebaseCloudMessagingChannel $firebaseCloudMessagingChannel;

    private Messaging|Mock $firebaseCloudMessaging;

    protected function setUp(): void
    {
        parent::setUp();

        $this->firebaseCloudMessaging = \Mockery::mock(Messaging::class);
        $this->firebaseCloudMessagingChannel = new FirebaseCloudMessagingChannel($this->firebaseCloudMessaging);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->firebaseCloudMessagingChannel, $this->firebaseCloudMessaging);
    }

    public function testSend(): void
    {
        /*
         *
         *
         * @todo This test is incomplete.
         */
        self::markTestIncomplete();
    }
}
