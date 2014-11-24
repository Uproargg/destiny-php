<?php namespace Destiny\Game;

use GuzzleHttp\Client as Http;
use Destiny\Support\Collections\CharacterCollection;

class Player {

    /**
     * Class Guzzle instance.
     *
     * @var \GuzzleHttp\Client
     */
    protected $http;

    /**
     * The players icon path.
     *
     * @var string
     */
    public $iconPath;

    /**
     * The players membership type.
     * 1 => Xbox
     * 2 => PSN
     *
     * @var int
     */
    public $membershipType;

    /**
     * The players membership ID.
     *
     * @var int
     */
    public $membershipId;

    /**
     * The players display name.
     *
     * @var string
     */
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
     * @return \Destiny\Support\Collections\CharacterCollection
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

        return new CharacterCollection(
            $json['Response']['data']['characters']
        );
    }

}