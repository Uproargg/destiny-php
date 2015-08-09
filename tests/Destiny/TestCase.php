<?php

namespace Destiny;

use GuzzleHttp\Client;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Subscriber\Mock;

class TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * The Destiny client instance.
     * 
     * @return \Destiny\Destiny
     */
    protected function destinyClient()
    {
        return new Destiny(getenv('DESTINY_API_KEY'));
    }

    /**
     * Create a Response object from a stub.
     *
     * @param $stub
     *
     * @return \GuzzleHttp\Message\Response
     */
    private function makeResponse($stub)
    {
        $response = new Response(200);

        $response->setHeader('Content-Type', 'application/json');

        $responseBody = Stream::factory(fopen(
            './tests/Destiny/stubs/'.$stub.'.txt', 'r+')
        );

        $response->setBody($responseBody);

        return $response;
    }
}
