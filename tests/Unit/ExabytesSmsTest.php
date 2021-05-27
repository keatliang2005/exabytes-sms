<?php

namespace Premgthb\ExabytesSms\Tests;

use Premgthb\ExabytesSms\Exabytes;
use Premgthb\ExabytesSms\ExabytesFacade;
use Premgthb\ExabytesSms\Tests\TestCase;

class ExabytesSmsTest extends TestCase
{
    /**
     * Test to check SMS delivered.
     */
    public function test_sms_request_successfully_generated()
    {
        $this->withoutExceptionHandling();
        $data = [
            'to' => '0123334444',
            'message' => 'Verification code 011222'
        ];

        $response = ExabytesFacade::sendMessage($data);
        

        $this->assertEquals($response, 'https://smsportal.exabytes.my/isms_send.php?un=exabytes&pwd=exabytes123&dstno=0123334444&msg=Verification+code+011222&type=1&sender_id=60000&agreedterm=YES');
    }
}
