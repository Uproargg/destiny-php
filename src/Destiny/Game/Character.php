<?php namespace Destiny\Game;

use Destiny\Support\Traits\MakesApiConnections;
use Destiny\Support\Traits\ResolvesKeysToProperties;

class Character {

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
     * Constructor
     *
     * @param $characterData
     */
    public function __construct(array $characterData)
    {
        $this->init();
        $this->characterData = $characterData;
        $this->inventory = $this->fetchInventory();
    }

    /**
     * Fetch the character's inventory.
     *
     * @return \Destiny\Game\Inventory
     */
    protected function fetchInventory()
    {
        $json = $this->requestJson('/' . static::makeTypeWord($this->membershipType) . '/Account/' . $this->membershipId . '/Character/' . $this->characterId . '/Inventory');

        return new Inventory($json);
    }

    /**
     * Fetch the character's activity data.
     *
     * @param $activityType
     * @return array
     */
    public function fetchActivityData($activityType)
    {
        $json = $this->requestJson('/Stats/ActivityHistory/' . $this->membershipType . '/' . $this->membershipId . '/' . $this->characterId . '/?mode=' . $activityType . '&definitions=true');

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