<?php namespace Destiny\Support;

use GuzzleHttp\Client;
use Destiny\Support\Exceptions\BungieUnavailableException;

class Http {

    /**
     * Guzzle instance.
     *
     * @var \GuzzleHttp\Client
     */
    protected $http;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->http = new Client;
    }

    /**
     * Request a URL an throw an exception if there is no response, otherwise handle JSON.
     *
     * @param $url
     * @throws \Destiny\Support\BungieUnavailableException
     * @return array
     */
    protected function requestJson($url)
    {
        $response = $this->http->get($url);

        if ( ! $response) {
            throw new BungieUnavailableException;
        }

        return $response->json();
    }

} 