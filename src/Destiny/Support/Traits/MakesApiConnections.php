<?php

namespace Destiny\Support\Traits;

use Destiny\Support\Exceptions\BungieUnavailableException;
use Destiny\Support\Exceptions\LegacyPlatformException;
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
     * Request a URL and throw an exception if there is no response, otherwise handle JSON.
     *
     * @param $url
     *
     * @throws \Destiny\Support\Exceptions\BungieUnavailableException
     *
     * @return array
     */
    protected function requestJson($url)
    {
        $response = $this->http->get($url, []);

        if (!$response) {
            throw new BungieUnavailableException();
        }

        $json = json_decode($response->getBody()->getContents(), true);

        if (isset($json['ErrorCode'])) {
            switch ($json['ErrorCode']) {
                case 1670:
                    throw new LegacyPlatformException();
                    break;
            }
        }

        return $json;
    }
}
