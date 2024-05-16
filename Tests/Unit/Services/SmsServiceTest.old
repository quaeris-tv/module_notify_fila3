<?php

declare(strict_types=1);

namespace Tests\Unit\Modules\Notify\Services;

use Modules\Notify\Services\SmsService;
use SmsService as SmsServiceAlias;
use Tests\TestCase;

/**
 * Class SmsServiceTest.
 *
 * @covers \Modules\Notify\Services\SmsService
 */
final class SmsServiceTest extends TestCase
{
    private SmsService $smsService;

    protected function setUp(): void
    {
        parent::setUp();

        /*
         *
         *
         * @todo Correctly instantiate tested object to use it.
         */
        $this->smsService = new SmsService;
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->smsService);
    }

    public function testGetInstance(): void
    {
        $expected = \Mockery::mock(SmsServiceAlias::class);
        $property = (new \ReflectionClass(SmsService::class))
            ->getProperty('instance');
        $property->setValue(null, $expected);
        self::assertSame($expected, SmsService::getInstance());
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

    public function testSetLocalVars(): void
    {
        /*
         *
         *
         * @todo This test is incomplete.
         */
        self::markTestIncomplete();
    }

    public function testMergeVars(): void
    {
        /*
         *
         *
         * @todo This test is incomplete.
         */
        self::markTestIncomplete();
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

    public function testGetVars(): void
    {
        $expected = [];
        $property = (new \ReflectionClass(SmsService::class))
            ->getProperty('vars');
        $property->setValue($this->smsService, $expected);
        self::assertSame($expected, $this->smsService->getVars());
    }
}
