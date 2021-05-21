<?php

namespace Exabytes\SmsNotifications\Tests;

use Exabytes\SmsNotifications\ExabytesServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            ExabytesServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {

    }
}