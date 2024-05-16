<?php

declare(strict_types=1);

namespace Tests\Unit\Modules\Notify\Services;

use MailService as MailServiceAlias;
use Modules\Notify\Services\MailService;
use Tests\TestCase;

/**
 * Class MailServiceTest.
 *
 * @covers \Modules\Notify\Services\MailService
 */
final class MailServiceTest extends TestCase
{
    private MailService $mailService;

    protected function setUp(): void
    {
        parent::setUp();

        /*
         *
         *
         * @todo Correctly instantiate tested object to use it.
         */
        $this->mailService = new MailService;
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->mailService);
    }

    public function testGetInstance(): void
    {
        $expected = \Mockery::mock(MailServiceAlias::class);
        $property = (new \ReflectionClass(MailService::class))
            ->getProperty('instance');
        $property->setValue(null, $expected);
        self::assertSame($expected, MailService::getInstance());
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

    public function testTry(): void
    {
        /*
         *
         *
         * @todo This test is incomplete.
         */
        self::markTestIncomplete();
    }
}
