<?php namespace Destiny\Game;

class Character {

    /**
     * The character data.
     *
     * @var array
     */
    protected $characterData;

    /**
     * Constructor
     *
     * @param $characterData
     */
    public function __construct(array $characterData)
    {
        $this->characterData = $characterData;
    }

    /**
     * Resolve a key from the character info array.
     *
     * @param $key
     * @param $array
     * @return null
     */
    protected function resolveKey($key, $array)
    {
        if(array_key_exists($key, $array))
        {
            return $array[$key];
        }

        foreach($array as $value)
        {
            if(is_array($value))
            {
                return $this->resolveKey($key, $value);
            }

            return $value;
        }

        return null;
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