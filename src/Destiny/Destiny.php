<?php namespace Destiny;

use Destiny\Game\Player;
use Destiny\Support\Exceptions\PlayerNotFoundException;
use Destiny\Support\Traits\MakesApiConnections;
use GuzzleHttp\Client;

class Destiny
{

    use MakesApiConnections;

    /**
     * Constructor
     *
     * @param \GuzzleHttp\Client $http
     */
    public function __construct(Client $http = null)
    {
        $this->http = new Client;

        if (!is_null($http)) {
            $this->http = $http;
        }
    }

    /**
     * Fetch a player by username and platform.
     *
     * @param $username
     * @param $platform
     * @return \Destiny\Game\User
     */
    public function fetchPlayer($username, $platform)
    {
        $json = $this->requestJson('http://bungie.net/Platform/Destiny/SearchDestinyPlayer/' . $platform . '/' . $username);

        if (!isset($json['Response'][0]['membershipId'])) {
            throw new PlayerNotFoundException;
        }

        return new Player(
            $json['Response'][0]['iconPath'],
            $json['Response'][0]['membershipType'],
            $json['Response'][0]['membershipId'],
            $json['Response'][0]['displayName'],
            $this->http
        );
    }

    /**
     * Check whether a player exists.
     *
     * @param $username
     * @param $platform
     * @return bool
     */
    public function playerExists($username, $platform)
    {
        try
        {
            $this->fetchPlayer($username, $platform);
        } catch (PlayerNotFoundException $e) {
            return false;
        }

        return true;
    }

    /**
     * Fetch an Xbox player by username.
     *
     * @param $username
     * @return \Destiny\Game\User
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
     */
    public function fetchPsnPlayer($username)
    {
        return $this->fetchPlayer($username, 2);
    }

}
