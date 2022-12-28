<?php

namespace i616\Soteria\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \i616\Soteria\Soteria
 */
class Soteria extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \i616\Soteria\Soteria::class;
    }
}
