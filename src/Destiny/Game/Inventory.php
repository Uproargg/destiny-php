<?php namespace Destiny\Game;

class Inventory {

    /**
     * Items in the inventory.
     *
     * @var array
     */
    protected $inventoryEquippable;

    /**
     * Definitions for items in the inventory.
     *
     * @var array
     */
    protected $inventoryDefinitions;

    /**
     * Constructor
     *
     * @param array $inventoryData
     */
    public function __construct(array $inventoryData)
    {
        $this->inventoryEquippable = $inventoryData['Response']['data']['buckets']['Equippable'];
        $this->inventoryDefinitions = $inventoryData['Response']['definitions']['items'];
    }

    /**
     * Makes Item classes from an index.
     *
     * @param $index
     * @return \Destiny\Game\Item
     */
    protected function makeItem($index)
    {
        $definition = $this->inventoryDefinitions[$this->inventoryEquippable[$index]['items'][0]['itemHash']];

        return new Item(
            $this->inventoryEquippable[$index]['items'],
            $definition
        );
    }

    /**
     * The selected subclass.
     *
     * @return \Destiny\Game\Item
     */
    public function subclass()
    {
        return $this->makeItem(0);
    }

    /**
     * The selected primary.
     *
     * @return \Destiny\Game\Item
     */
    public function primary()
    {
        return $this->makeItem(1);
    }

    /**
     * The selected secondary.
     *
     * @return \Destiny\Game\Item
     */
    public function secondary()
    {
        return $this->makeItem(2);
    }

    /**
     * The selected heavy.
     *
     * @return \Destiny\Game\Item
     */
    public function heavy()
    {
        return $this->makeItem(3);
    }

    /**
     * The selected helmet.
     *
     * @return \Destiny\Game\Item
     */
    public function helmet()
    {
        return $this->makeItem(4);
    }

    /**
     * The selected arms.
     *
     * @return \Destiny\Game\Item
     */
    public function arms()
    {
        return $this->makeItem(5);
    }

    /**
     * The selected pants.
     *
     * @return \Destiny\Game\Item
     */
    public function pants()
    {
        return $this->makeItem(6);
    }

    /**
     * The selected boots.
     *
     * @return \Destiny\Game\Item
     */
    public function boots()
    {
        return $this->makeItem(7);
    }

    /**
     * The selected class item.
     *
     * @return \Destiny\Game\Item
     */
    public function classItem()
    {
        return $this->makeItem(8);
    }

    /**
     * The selected ghost shell.
     *
     * @return \Destiny\Game\Item
     */
    public function ghost()
    {
        return $this->makeItem(9);
    }

    /**
     * The selected sparrow.
     *
     * @return \Destiny\Game\Item
     */
    public function sparrow()
    {
        return $this->makeItem(10);
    }

    /**
     * The selected ship.
     *
     * @return \Destiny\Game\Item
     */
    public function ship()
    {
        return $this->makeItem(11);
    }

    /**
     * The selected shader.
     *
     * @return \Destiny\Game\Item
     */
    public function shader()
    {
        return $this->makeItem(12);
    }

    /**
     * The selected emblem.
     *
     * @return \Destiny\Game\Item
     */
    public function emblem()
    {
        return $this->makeItem(13);
    }

    /**
     * The amount of glimmer available.
     *
     * @return int
     */
    public function glimmer()
    {
        return $this->inventoryData['Response']['data']['currencies'][0]['value'];
    }

    /**
     * The amount of crucible marks this character has.
     *
     * @return int
     */
    public function crucibleMarks()
    {
        return $this->inventoryData['Response']['data']['currencies'][1]['value'];
    }

    /**
     * The amount of vanguard marks this character has.
     *
     * @return int
     */
    public function vanguardMarks()
    {
        return $this->inventoryData['Response']['data']['currencies'][2]['value'];
    }

} 