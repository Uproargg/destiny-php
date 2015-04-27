<?php namespace Destiny\Support\Traits;

use Destiny\Support\Exceptions\BungieUnavailableException;
use GuzzleHttp\Client;

trait MakesApiConnections
{

    /**
     * A Guzzle client instance.
     *
     * @var \GuzzleHttp\Client
     */
    protected $http;

    /**
     * Request a URL an throw an exception if there is no response, otherwise handle JSON.
     *
     * @param $url
     * @throws \Destiny\Support\Exceptions\BungieUnavailableException
     * @return array
     */
    protected function requestJson($url)
    {
        $response = $this->http->get($url);

        if (!$response) {
            throw new BungieUnavailableException;
        }

        return $response->json();
    }

}
