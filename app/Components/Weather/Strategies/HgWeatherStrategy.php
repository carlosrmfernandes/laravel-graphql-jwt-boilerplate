<?php

namespace App\Components\Weather\Strategies;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use App\Components\Weather\Contracts\HgWeatherInterface;
use App\Components\Weather\Exceptions\HgWeatherException;
use Madewithlove\Tactician\Traits\DispatchesJobs;

class HgWeatherStrategy implements HgWeatherInterface
{

    use DispatchesJobs;

    /**
     * @var Client
     */
    protected $client;

    /**
     * HgWeatherStrategy constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $toWoeid     
     * @return Object
     * @throws HgWeatherException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function weatherMessage(
    int $toWoeid
    ): Object
    {
        try {
            $response = $this->client->request('GET', '/weather', [
                'json' => [
                    'toWoeid' =>  $toWoeid,                    
                ]
            ]);
            $response = json_decode($response->getBody()->getContents());            
            return $response;
        } catch (ClientException $exception) {
            $response = json_decode($exception->getResponse()->getBody()->getContents());

            throw new HgWeatherException(
            $response->message, $exception->getCode()
            );
        } catch (Exception $exception) {
            throw $exception;
        }
    }

}
