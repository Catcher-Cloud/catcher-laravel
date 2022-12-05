<?php

return [
    'environment' => env('APP_ENVIRONMENT', 'production'),

    'handleException' => env('CATCHER_HANDLE_EXCEPTION', true),
    'handleError' => env('CATCHER_HANDLE_ERROR', true),
    'handleFatal' => env('CATCHER_HANDLE_FATAL', true),

    'accessToken' => env('CATCHER_ACCESS_TOKEN'),

    'defaultLoggingLevel' => env('CATCHER_DEFAULT_LOGGING_LEVEL', 'DEBUG'),

    'sender' => null,

    'baseException' => null,
];
