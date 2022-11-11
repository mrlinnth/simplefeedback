<?php

namespace Mrlinnth\Simplefeedback\Facades;

use Illuminate\Support\Facades\Facade;

class Simplefeedback extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'simplefeedback';
    }
}
