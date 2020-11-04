<?php

namespace App\Http\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class HgWeatherResultsType extends GraphQLType
{

    /**
     * @var array
     */
    protected $attributes = [
        'name' => 'HgWeatherResults',
        'description' => 'A Weather Results',
    ];

    /**
     * define field of type
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            'temp' => [
                'type' => Type::int(),
                'description' => 'The temp'
            ],
            'time' => [
                'type' => Type::string(),
                'description' => 'The time'
            ],
            'condition_code' => [
                'type' => Type::string(),
                'description' => 'The condition code'
            ],
            'description' => [
                'type' => Type::string(),
                'description' => 'The description'
            ],
            'currently' => [
                'type' => Type::string(),
                'description' => 'The currently'
            ],
            'date' => [
                'type' => Type::string(),
                'description' => 'The date'
            ],
            'cid' => [
                'type' => Type::string(),
                'description' => 'The cid'
            ],
            'city' => [
                'type' => Type::string(),
                'description' => 'The city'
            ],
            'img_id' => [
                'type' => Type::string(),
                'description' => 'The img id'
            ],
            'humidity' => [
                'type' => Type::int(),
                'description' => 'The humidity'
            ],
            'wind_speedy' => [
                'type' => Type::string(),
                'description' => 'The wind speedy'
            ],
            'sunrise' => [
                'type' => Type::string(),
                'description' => 'The sunrise'
            ],
            'sunset' => [
                'type' => Type::string(),
                'description' => 'The sunset'
            ],
            'condition_slug' => [
                'type' => Type::string(),
                'description' => 'The condition slug'
            ],
            'city_name' => [
                'type' => Type::string(),
                'description' => 'Thecity name'
            ],
            
            'forecast' => [
                'type' => Type::listOf(GraphQL::type('hgWeatherForecast')),
                'description' => 'The forecast'
            ],
        ];
    }
}
