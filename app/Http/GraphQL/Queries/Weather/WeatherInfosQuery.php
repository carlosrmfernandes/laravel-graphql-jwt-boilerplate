<?php

namespace App\Http\GraphQL\Queries\Weather;

use Closure;
use GraphQL\Type\Definition\Type;
use App\Http\GraphQL\Queries\BaseQuery;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Facades\GraphQL;

class WeatherInfosQuery extends BaseQuery
{

    /**
     * @var array
     */
    protected $attributes = [
        'name' => 'Weather Info Query',
        'description' => 'A query of weather informations'
    ];

    /**
     * @return Type
     */
    public function type(): Type
    {
        return GraphQL::type('hgWeather');
    }

    /**
     * arguments to filter query
     *
     * @return array
     */
    public function args(): array
    {
        return [
            'woeid' => [
                'name' => 'woeid',
                'type' => Type::int()
            ],
        ];
    }

    /**
     * @param mixed $root
     * @param array $args
     * @param mixed $context
     * @param ResolveInfo $resolveInfo
     * @param Closure $getSelectFields
     * @return Object
     */
    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields):Object
    {
        return app('App\Components\Weather\Contracts\HgWeatherInterface')
                        ->weatherMessage($args['woeid']);
    }

}
