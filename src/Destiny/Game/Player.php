<?php namespace Destiny\Game;

use GuzzleHttp\Client as Http;

class Player {

    /**
     * @var \GuzzleHttp\Client
     */
    private $http;

    public $iconPath;

    public $membershipType;

    public $membershipId;

    public $displayName;

    /**
     * Constructor
     *
     * @param $iconPath
     * @param $membershipType
     * @param $membershipId
     * @param $displayName
     */
    public function __construct($iconPath, $membershipType, $membershipId, $displayName)
    {
        $this->http = new Http;
        $this->iconPath = $iconPath;
        $this->membershipType = $membershipType;
        $this->membershipId = $membershipId;
        $this->displayName = $displayName;
    }

    /**
     * Fetch a users Destiny characters.
     *
     * @return mixed
     */
    public function fetchCharacters()
    {
        $type = 'TigerXbox';

        if($this->membershipType == 2)
        {
            $type = 'TigerPSN';
        }

        $response = $this->http->get('http://www.bungie.net/Platform/Destiny/' . $type . '/Account/' . $this->membershipId);

        $json = $response->json();

        return $json['Response']['data']['characters'][0]['characterBase'];
    }

}