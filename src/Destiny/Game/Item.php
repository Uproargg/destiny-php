<?php namespace Destiny\Game;

use Destiny\Support\Traits\ResolvesKeysToProperties;

class Item
{

    use ResolvesKeysToProperties;

    /**
     * The mixed array with all the items important attributes.
     *
     * @var array
     */
    protected $item;

    /**
     * Constructor
     *
     * @param $itemData
     * @param $itemDefinition
     */
    public function __construct($itemData, $itemDefinition)
    {
        $this->item = array_merge($itemData, $itemDefinition);
    }

    /**
     * Retrieve keys with a magic getter.
     *
     * @param $name
     * @return null
     */
    public function __get($name)
    {
        return $this->resolveKey($name, $this->item);
    }

}
