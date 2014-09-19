<?php namespace Fueldevco\Boilerplate\Stubs;

/**
 * Class AwsStubs
 *
 * @package Fueldevco\Boilerplate\Stubs
 */
class AwsStubs
{
    /**
     * @param string $origin
     * @param string $header
     *
     * @return array
     */
    public static function S3CorsRules($origin = '*', $header = '*')
    {
        return  [
            'AllowedHeaders' => ['AllowedHeader' => $header],
            'AllowedMethods' => ['AllowedMethod' => 'PUT', 'POST', 'DELETE', 'GET'],
            'AllowedOrigins' => ['AllowedOrigin' => $origin]
        ];
    }
}