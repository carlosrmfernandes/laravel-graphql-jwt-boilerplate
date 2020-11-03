<?php

namespace App\Components\Weather\Contracts;

interface HgWeatherInterface
{
    /**
     * @param int $towoeid     
     * @return Object
     */
    public function weatherMessage(
        int $towoeid        
    ): Object;
}
