<?php

namespace App\Http\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class HgWeatherForecastType extends GraphQLType
{

    /**
     * @var array
     */
    protected $attributes = [
        'name' => 'HgWeatherForecast',
        'description' => 'A Weather Forecast',
    ];

    /**
     * define field of type
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            'date' => [
                'type' => Type::string(),
                'description' => 'The date'
            ],
            'weekday' => [
                'type' => Type::string(),
                'description' => 'The weekday'
            ],
            'max' => [
                'type' => Type::int(),
                'description' => 'The time'
            ],
            'min' => [
                'type' => Type::int(),
                'description' => 'The condition code'
            ],
            'description' => [
                'type' => Type::string(),
                'description' => 'The description'
            ],
            'condition' => [
                'type' => Type::string(),
                'description' => 'The condition'
            ],
        ];
    }
}
