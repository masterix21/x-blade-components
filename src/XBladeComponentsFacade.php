<?php

namespace Masterix21\XBladeComponents;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Masterix21\XBladeComponents\XBladeComponents
 */
class XBladeComponentsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'x-blade-components';
    }
}
