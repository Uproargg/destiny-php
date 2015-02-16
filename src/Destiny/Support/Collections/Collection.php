<?php namespace Destiny\Support\Collections;

use Countable;

class Collection implements Countable {

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
     * Get all of the items in the collection.
     *
     * @return array
     */
    public function all()
    {
        return $this->items;
    }

    /**
     * Get an item from the collection by key.
     *
     * @param $key
     * @return mixed|null
     */
    public function get($key)
    {
        return array_key_exists($key, $this->items) ? $this->items[$key] : null;
    }

    /**
     * Get the first item from the collection.
     *
     * @return mixed|null
     */
    public function first()
    {
        return count($this->items) > 0 ? reset($this->items) : null;
    }

    /**
     * Get the last item from the collection.
     *
     * @return mixed|null
     */
    public function last()
    {
        return count($this->items) > 0 ? end($this->items) : null;
    }

    /**
     * Add an item to the end of the collection.
     *
     * @param $value
     */
    public function push($value)
    {
        $this->items[] = $value;
    }

    /**
     * Count the number of items in the collection.
     *
     * @return int
     */
    public function count()
    {
        return count($this->items);
    }

} 