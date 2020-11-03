<?php

namespace App\Components\Sms\Exceptions;

use Exception;
use Throwable;
use Illuminate\Support\Facades\Log;

class SmsException extends Exception
{
    /**
     * SmsException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(
        $message = '',
        $code = 500,
        Throwable $previous = null
    ) {
        Log::error('WhatsApp Error: ' . $message);
        parent::__construct($message, $code, $previous);
    }
}
