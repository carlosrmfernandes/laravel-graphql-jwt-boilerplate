<?php

namespace App\Http\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class HgWeatherType extends GraphQLType
{

    /**
     * @var array
     */
    protected $attributes = [
        'name' => 'HgWeather',
        'description' => 'A HgWeather',
    ];

    /**
     * define field of type
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            'by' => [
                'type' => Type::string(),
                'description' => 'The by'
            ],
            'valid_key' => [
                'type' => Type::int(),
                'description' => 'The valid key'
            ],
            'results' => [
                'type' => GraphQL::type('hgWeatherResults'),
                'description' => 'The id of the type'
            ],
            
        ];
    }
}
