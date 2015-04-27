<?php namespace Destiny\Support\Traits;

trait ResolvesKeysToProperties
{

    /**
     * Resolve a key from the character info array.
     *
     * @param $key
     * @param $array
     * @return null
     */
    protected function resolveKey($key, $array)
    {
        if (array_key_exists($key, $array)) {
            return $array[$key];
        }

        foreach ($array as $value) {
            if (is_array($value)) {
                return $this->resolveKey($key, $value);
            }
        }

        return null;
    }

    /**
     * Retrieve keys with a magic getter.
     *
     * @param $name
     * @return null
     */
    abstract public function __get($name);

}
