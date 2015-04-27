<?php namespace Destiny;

use GuzzleHttp\Client;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Subscriber\Mock;

class TestCase extends \PHPUnit_Framework_TestCase
{

    /**
     * Create an instance of the Guzzle client for tests.
     *
     * @return \GuzzleHttp\Client
     */
    protected function http()
    {
        $client = new Client;

        $mock = new Mock([
            $this->makeResponse('player'),
            $this->makeResponse('characters'),
            $this->makeResponse('inventory1'),
            $this->makeResponse('progression1'),
            $this->makeResponse('inventory2'),
            $this->makeResponse('progression2'),
            $this->makeResponse('inventory3'),
            $this->makeResponse('progression3'),
            $this->makeResponse('grimoire'),
            $this->makeResponse('activities'),
            $this->makeResponse('pgcr'),
        ]);

        $client->getEmitter()->attach($mock);

        return $client;
    }

    /**
     * Create a Response object from a stub.
     *
     * @param $stub
     * @return \GuzzleHttp\Message\Response
     */
    private function makeResponse($stub)
    {
        $response = new Response(200);

        $response->setHeader('Content-Type', 'application/json');

        $responseBody = Stream::factory(fopen(
            './tests/Destiny/stubs/' . $stub . '.txt', 'r+')
        );

        $response->setBody($responseBody);

        return $response;
    }

}
