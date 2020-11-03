<?php

namespace App\Components\Weather\Exceptions;

use Exception;
use Throwable;
use Illuminate\Support\Facades\Log;

class HgWeatherException extends Exception
{
    /**
     * HgWeatherException constructor.     
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(
        $message = '',
        $code = 500,
        Throwable $previous = null
    ) {
        Log::error('Error: ' . $message);
        parent::__construct($message, $code, $previous);
    }
}
