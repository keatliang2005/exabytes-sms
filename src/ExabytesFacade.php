<?php

namespace Premgthb\ExabytesSms;

use Illuminate\Support\Facades\Facade;

class ExabytesFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'exabytes';
    }
}