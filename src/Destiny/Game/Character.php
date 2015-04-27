<?php namespace Destiny\Game;

use Destiny\Support\Traits\MakesApiConnections;
use Destiny\Support\Traits\ResolvesKeysToProperties;
use GuzzleHttp\Client;

class Character
{

    use MakesApiConnections, ResolvesKeysToProperties;

    /**
     * The character data.
     *
     * @var array
     */
    protected $characterData;

    /**
     * The character's inventory.
     *
     * @var \Destiny\Game\Inventory
     */
    public $inventory;

    /**
     * The character's progression.
     *
     * @var array
     */
    public $progression;

    /**
     * Constructor
     *
     * @param array $characterData
     * @param \GuzzleHttp\Client $http
     */
    public function __construct(array $characterData, Client $http)
    {
        $this->http = $http;
        $this->characterData = $characterData;
        $this->inventory = $this->fetchInventory();
        $this->progression = $this->fetchProgression();
    }

    /**
     * Fetch the character's inventory.
     *
     * @return \Destiny\Game\Inventory
     */
    protected function fetchInventory()
    {
        $json = $this->requestJson('http://bungie.net/Platform/Destiny/' . $this->membershipType . '/Account/' . $this->membershipId . '/Character/' . $this->characterId . '/Inventory?definitions=true');

        return new Inventory($json);
    }

    /**
     * Fetch the character's progression data.
     *
     * @return array
     */
    protected function fetchProgression()
    {
        $json = $this->requestJson('http://bungie.net/Platform/Destiny/' . $this->membershipType . '/Account/' . $this->membershipId . '/Character/' . $this->characterId . '/Progression?definitions=true');

        return $json;
    }

    /**
     * Fetch the character's activity data.
     *
     * @param $activityType
     * @param $definitions
     * @return array
     */
    public function fetchActivityData($activityType, $definitions = true)
    {
        $json = $this->requestJson('http://bungie.net/Platform/Destiny/Stats/ActivityHistory/' . $this->membershipType . '/' . $this->membershipId . '/' . $this->characterId . '/?mode=' . $activityType . '&definitions=' . json_encode($definitions));

        return $json;
    }

    /**
     * Fetch the post game carnage report for an activity.
     *
     * @param $activityId
     * @param $definitions
     * @return array
     */
    public function fetchPostGameCarnageReport($activityId, $definitions = true)
    {
        $json = $this->requestJson('http://bungie.net/Platform/Destiny/Stats/PostGameCarnageReport/' . $activityId . '&definitions=' . json_encode($definitions));

        return $json;
    }

    /**
     * Retrieve keys with a magic getter.
     *
     * @param $name
     * @return null
     */
    public function __get($name)
    {
        return $this->resolveKey($name, $this->characterData);
    }

}
