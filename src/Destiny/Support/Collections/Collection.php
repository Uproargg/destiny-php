<?php namespace Destiny\Support\Collections;

class Collection {

    /**
     * The items of the collection.
     *
     * @var array
     */
    protected $items = [];

    /**
     * Constructor
     *
     * @param array $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * Get an object in the collection by key.
     *
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->items[$key];
    }

} 