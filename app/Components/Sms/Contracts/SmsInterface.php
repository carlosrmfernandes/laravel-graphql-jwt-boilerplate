<?php

namespace App\Components\Sms\Contracts;

interface SmsInterface
{
    /**
     * @param string $toNumber
     * @param string $message
     * @return Object
     */
    public function sendMessage(
        string $toNumber,
        string $message
    ): Object;
}
