<?php

namespace Catcher\Laravel\Facades;

use Catcher\Response;
use Illuminate\Support\Facades\Facade;

/**
 * @method Response|null log($level, $data)
 * @method Response|null debug($data)
 * @method Response|null info($data)
 * @method Response|null warning($data)
 * @method Response|null error($data)
 * @method Response|null critical($data)
 */
class Catcher extends Facade
{
    protected static function getFacadeAccessor()
    {
        return app(\Catcher\Catcher::class);
    }
}
