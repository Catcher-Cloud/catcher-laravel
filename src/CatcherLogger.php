<?php

namespace Catcher\Laravel;

use Catcher\Catcher;
use Catcher\Logger;
use Catcher\Payloads\Level;
use Catcher\Response;

class CatcherLogger
{
    public static Logger $instance;

    function __construct(Logger $logger)
    {
        self::$instance = $logger;
    }

    protected function normaliseData($data)
    {
        if($data instanceof \Throwable) {
            return self::$instance
                ->builder()
                ->wrap(
                    errorNumber: $data->getCode(),
                    errorString: $data->getMessage(),
                    errorFile: $data->getFile(),
                    errorLine: $data->getLine(),
                    errorType: get_class($data)
                );
        }

        return $data;
    }

    public function log(string $level, $data): ?\Catcher\Response
    {
        $data = $this->normaliseData($data);
        return self::$instance->log($level, $data);
    }

    public function debug($data): ?Response
    {
        return self::log(Level::DEBUG, $data);
    }

    public function info($data): ?Response
    {
        return self::log(Level::INFO, $data);
    }

    public function warning($data): ?Response
    {
        return self::log(Level::WARNING, $data);
    }

    public function error($data): ?Response
    {
        return self::log(Level::ERROR, $data);
    }

    public function critical($data): ?Response
    {
        return self::log(Level::CRITICAL, $data);
    }
}
