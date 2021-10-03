<?php

namespace robiokidenis\Fcm;

use Illuminate\Support\Facades\Facade;

/**
 * Class FcmFacade
 * @package robiokidenis\Fcm\Facades
 */
class FcmFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'fcm';
    }
}
