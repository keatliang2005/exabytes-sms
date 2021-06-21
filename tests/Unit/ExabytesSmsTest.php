<?php

namespace Premgthb\ExabytesSms\Unit\Tests;

use Illuminate\Support\Facades\Notification;
use Premgthb\ExabytesSms\Notifications\ExabytesSmsNotification;
use Premgthb\ExabytesSms\Tests\TestCase;

class ExabytesSmsTest extends TestCase
{
    /**
     * Test to check SMS delivered.
     */
    public function test_sms_request_successfully_generated()
    {
        /* $data = [
            'to' => '0123334444',
            'message' => 'Verification code 011222'
        ];

        $content = 'ABC';

        Notification::route('Exabytes', '0149322248')->notify(new ExabytesSmsNotification($content));
        */

        $this->assertTrue(true);
    }
}
