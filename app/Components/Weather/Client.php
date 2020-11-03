<?php

namespace App\Components\Weather;

use Exception;
use App\Components\Weather\Contracts\HgWeatherInterface;
use App\Components\Weather\Exceptions\WeatherException;

class Client
{
    /**
     * @var HgWeatherInterface
     */
    protected $hgWeatherStrategy;

    /**
     * Client constructor.
     * @param HgWeatherInterface $hgWeatherStrategy
     */
    public function __construct(HgWeatherInterface $hgWeatherStrategy)
    {        
        $this->hgWeatherStrategy = $hgWeatherStrategy;
    }

    /**
     * @param int $towoeid     
     * @return Object
     * @throws WeatherException
     */
    public function weatherMessage(
        int $towoeid       
    ): Object {          
        try {
            return $this->hgWeatherStrategy->weatherMessage(
                $towoeid                
            );
        } catch (Exception $exception) {
            throw new WeatherException(
                $exception->getMessage(),
                $exception->getCode()
            );
        }
    }
}
