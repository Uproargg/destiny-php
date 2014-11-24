<?php namespace Destiny;

use GuzzleHttp\Client as Http;
use Destiny\Support\Exceptions\PlayerNotFoundException;
use Destiny\Game\Player;

class Client {

    /**
     * @var \GuzzleHttp\Client
     */
    private $http;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->http = new Http;
    }

    /**
     * Fetch a player by username and platform.
     *
     * @param $username
     * @param $platform
     * @throws \Destiny\Support\Exceptions\PlayerNotFoundException
     * @return \Destiny\Game\User
     */
    public function fetchPlayer($username, $platform)
    {
        $response = $this->http->get('http://www.bungie.net/Platform/Destiny/SearchDestinyPlayer/' . $platform . '/' . $username);

        $json = $response->json();

        if( ! isset($json['Response'][0]['membershipId']))
        {
            throw new PlayerNotFoundException;
        }

        return new Player(
            $json['Response'][0]['iconPath'],
            $json['Response'][0]['membershipType'],
            $json['Response'][0]['membershipId'],
            $json['Response'][0]['displayName']
        );
    }

    /**
     * Fetch an Xbox player by username.
     *
     * @param $username
     * @return \Destiny\Game\User
     * @throws \Destiny\Support\Exceptions\PlayerNotFoundException
     */
    public function fetchXboxPlayer($username)
    {
        return $this->fetchPlayer($username, 1);
    }

    /**
     * Fetch a PSN player by username.
     *
     * @param $username
     * @return \Destiny\Game\User
     * @throws \Destiny\Support\Exceptions\PlayerNotFoundException
     */
    public function fetchPsnPlayer($username)
    {
        return $this->fetchPlayer($username, 2);
    }

} 