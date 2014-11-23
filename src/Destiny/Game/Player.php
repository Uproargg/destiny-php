<?php namespace Destiny\Game;

class Player {

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

        return $json['Response']['data']['characters'];
    }

}