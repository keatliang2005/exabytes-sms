<?php

namespace Premgthb\ExabytesSms\Tests;

use Premgthb\ExabytesSms\ExabytesServiceProvider;

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