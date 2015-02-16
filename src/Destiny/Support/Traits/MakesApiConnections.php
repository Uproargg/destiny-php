<?php namespace Destiny\Support\Traits;

use GuzzleHttp\Client;
use Destiny\Support\Exceptions\BungieUnavailableException;

trait MakesApiConnections {

    /**
     * Guzzle instance.
     *
     * @var \GuzzleHttp\Client
     */
    protected $http;

    /**
     * Initialize the trait.
     */
    protected function init()
    {
        $this->http = new Client;
    }

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

        if ( ! $response) {
            throw new BungieUnavailableException;
        }

        return $response->json();
    }

    /**
     * Make the type word from the player type.
     *
     * @param $membershipType
     * @return string
     */
    public static function makeTypeWord($membershipType)
    {
        $type = 'TigerXbox';

        if ($membershipType == 2) {
            $type = 'TigerPSN';
        }

        return $type;
    }

} 