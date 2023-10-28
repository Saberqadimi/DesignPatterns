<?php

namespace DesignPatterns\Facade;

use Illuminate\Support\Facades\Facade;

class EcommerceFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'ecommerce';
    }

}
