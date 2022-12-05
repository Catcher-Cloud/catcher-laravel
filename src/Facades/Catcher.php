<?php

namespace Catcher\Laravel\Facades;

use Catcher\Response;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Response|null log($level, $data)
 * @method static Response|null debug($data)
 * @method static Response|null info($data)
 * @method static Response|null warning($data)
 * @method static Response|null error($data)
 * @method static Response|null critical($data)
 */
class Catcher extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'catcher';
    }
}
