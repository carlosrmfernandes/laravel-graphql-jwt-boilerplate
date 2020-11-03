<?php

namespace App\Components\Sms\Strategies;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use App\Components\Sms\Contracts\SmsInterface;
use App\Components\Sms\Exceptions\SmsException;
use Madewithlove\Tactician\Traits\DispatchesJobs;

class GatewayApiStrategy implements SmsInterface
{
    use DispatchesJobs;

    /**
     * @var Client
     */
    protected $client;

    /**
     * SmsStrategy constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $toNumber
     * @param string $message
     * @return Object
     * @throws SmsException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function sendMessage(
        string $toNumber,
        string $message
    ): Object {
        try {
            $response = $this->client->request('POST', '/rest/mtsms', [
                'json' => [
                    'message'    => $message,
                    'recipients' => [['msisdn' => $toNumber]],
                ]
            ]);

            $response = json_decode($response->getBody()->getContents());

            return $response;
        } catch (ClientException $exception) {
            $response = json_decode($exception->getResponse()->getBody()->getContents());

            throw new SmsException(
                $response->message,
                $exception->getCode()
            );
        } catch (Exception $exception) {
            throw $exception;
        }
    }
}
