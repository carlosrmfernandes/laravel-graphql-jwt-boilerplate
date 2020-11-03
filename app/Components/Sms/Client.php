<?php

namespace App\Components\Sms;

use Exception;
use App\Components\Sms\Contracts\SmsInterface;
use App\Components\Sms\Exceptions\SmsException;

class Client
{
    /**
     * @var SmsInterface
     */
    protected $smsStrategy;

    /**
     * Client constructor.
     * @param SmsInterface $smsStrategy
     */
    public function __construct(SmsInterface $smsStrategy)
    {
        $this->smsStrategy = $smsStrategy;
    }

    /**
     * @param string $toNumber
     * @param string $message
     * @return Object
     * @throws SmsException
     */
    public function sendMessage(
        string $toNumber,
        string $message
    ): Object {
        try {
            return $this->smsStrategy->sendMessage(
                $toNumber,
                $message
            );
        } catch (Exception $exception) {
            throw new SmsException(
                $exception->getMessage(),
                $exception->getCode()
            );
        }
    }
}
