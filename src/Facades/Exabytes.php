<?php

namespace Exabytes\SmsNotifications\Facades;

use Illuminate\Support\Facades\Facade;

class Exabytes extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'exabytes';
    }
}